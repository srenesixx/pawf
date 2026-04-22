const calculator = document.querySelector(".calculator");
const display = document.getElementById("display");
const historyEl = document.getElementById("history");
const buttons = document.querySelectorAll(".calc-btn");
const particleContainer = document.getElementById("particle-container");

if (!calculator || !display || !historyEl || buttons.length === 0) {
  console.warn("Calculator elements not found.");
} else {
  let currentInput = "0";
  let expression = "";
  let shouldResetInput = false;

  // --- SPRING ANIMATION & PARTICLES ---

  function createParticles(x, y, color) {
    for (let i = 0; i < 6; i++) {
      const particle = document.createElement("div");
      particle.style.position = "absolute";
      particle.style.left = `${x}px`;
      particle.style.top = `${y}px`;
      particle.style.width = "4px";
      particle.style.height = "4px";
      particle.style.borderRadius = "50%";
      particle.style.backgroundColor = color || "#22d3ee";
      particle.style.pointerEvents = "none";
      particle.style.boxShadow = `0 0 10px ${color || "#22d3ee"}`;
      
      const angle = Math.random() * Math.PI * 2;
      const velocity = 2 + Math.random() * 4;
      const vx = Math.cos(angle) * velocity;
      const vy = Math.sin(angle) * velocity;
      
      particleContainer.appendChild(particle);
      
      let opacity = 1;
      let posX = x;
      let posY = y;
      
      const animate = () => {
        posX += vx;
        posY += vy;
        opacity -= 0.03;
        
        particle.style.transform = `translate(${posX - x}px, ${posY - y}px)`;
        particle.style.opacity = opacity;
        
        if (opacity > 0) {
          requestAnimationFrame(animate);
        } else {
          particle.remove();
        }
      };
      
      requestAnimationFrame(animate);
    }
  }

  function animateDisplay(type = "normal") {
    display.style.transition = "none";
    display.style.transform = "scale(0.9) translateY(4px)";
    display.style.filter = "blur(2px)";
    
    // Spring physics simulation (simplified)
    const spring = {
      damping: 0.7,
      stiffness: 0.5,
      pos: 0.9,
      vel: 0,
      target: 1
    };
    
    const tick = () => {
      const force = (spring.target - spring.pos) * spring.stiffness;
      spring.vel = (spring.vel + force) * spring.damping;
      spring.pos += spring.vel;
      
      display.style.transform = `scale(${spring.pos})`;
      display.style.filter = `blur(${(1 - spring.pos) * 10}px)`;
      
      if (Math.abs(spring.target - spring.pos) > 0.001 || Math.abs(spring.vel) > 0.001) {
        requestAnimationFrame(tick);
      } else {
        display.style.transform = "scale(1)";
        display.style.filter = "none";
      }
    };
    
    requestAnimationFrame(tick);
  }

  function animateError() {
    calculator.style.transition = "none";
    let start = Date.now();
    const shake = () => {
      let elapsed = Date.now() - start;
      if (elapsed < 400) {
        let x = Math.sin(elapsed / 20) * 10;
        calculator.style.transform = `translateX(${x}px)`;
        requestAnimationFrame(shake);
      } else {
        calculator.style.transform = "";
      }
    };
    shake();
  }

  // --- CORE UTILS ---

  function updateDisplay(value = currentInput) {
    display.textContent = formatNumber(value);
    animateDisplay();
  }

  function updateHistory(value = expression || "0") {
    const prettyValue = value
      .replace(/\*/g, " × ")
      .replace(/\//g, " ÷ ")
      .replace(/\+/g, " + ")
      .replace(/-/g, " − ");
    historyEl.textContent = prettyValue;
  }

  function formatNumber(value) {
    if (value === "" || value === null || value === undefined) return "0";
    if (value === "Error") return "Error";
    const str = value.toString();
    if (/[+\-*/%]/.test(str) && isNaN(str)) return str;
    const parts = str.split(".");
    const integerPart = parts[0];
    const decimalPart = parts[1];
    const formattedInteger = isNaN(integerPart) ? integerPart : Number(integerPart).toLocaleString("en-US");
    return decimalPart !== undefined ? `${formattedInteger}.${decimalPart}` : formattedInteger;
  }

  function sanitizeExpression(expr) {
    return expr.replace(/×/g, "*").replace(/÷/g, "/").replace(/−/g, "-");
  }

  // --- ACTIONS ---

  function clearAll() {
    currentInput = "0";
    expression = "";
    shouldResetInput = false;
    updateHistory("0");
    updateDisplay("0");
  }

  function deleteLast() {
    if (currentInput === "Error") { clearAll(); return; }
    if (shouldResetInput) return;
    currentInput = currentInput.length > 1 ? currentInput.slice(0, -1) : "0";
    updateDisplay();
  }

  function handleNumber(value) {
    if (currentInput === "Error") { currentInput = value; updateDisplay(); return; }
    if (shouldResetInput) { currentInput = value; shouldResetInput = false; }
    else { currentInput = currentInput === "0" ? value : currentInput + value; }
    updateDisplay();
  }

  function handleDecimal() {
    if (currentInput === "Error") { currentInput = "0."; updateDisplay(); return; }
    if (shouldResetInput) { currentInput = "0."; shouldResetInput = false; updateDisplay(); return; }
    if (!currentInput.includes(".")) { currentInput += "."; updateDisplay(); }
  }

  function handleOperator(operator) {
    if (currentInput === "Error") return;
    if (expression && !shouldResetInput) {
      calculateResult();
      if (currentInput === "Error") return;
    }
    expression = `${currentInput}${operator}`;
    updateHistory(expression);
    shouldResetInput = true;
  }

  function calculateResult() {
    try {
      const safeExpression = sanitizeExpression(expression + currentInput);
      if (!/^[0-9+\-*/%.() ]+$/.test(safeExpression)) throw new Error("Invalid");
      
      const result = Function(`"use strict"; return (${safeExpression})`)();
      if (!isFinite(result)) throw new Error("Math error");

      const fullExpr = expression + currentInput;
      currentInput = Number.isInteger(result) ? String(result) : String(+result.toFixed(8));
      updateHistory(`${fullExpr} =`);
      expression = "";
      shouldResetInput = true;
      updateDisplay();
    } catch (error) {
      currentInput = "Error";
      updateDisplay("Error");
      animateError();
    }
  }

  // --- EVENT LISTENERS ---

  buttons.forEach((button) => {
    button.addEventListener("click", (e) => {
      // Get click color from computed property or data
      const color = window.getComputedStyle(button).color;
      createParticles(e.clientX, e.clientY, color);

      const value = button.dataset.value;
      const action = button.dataset.action;
      if (action === "clear") return clearAll();
      if (action === "delete") return deleteLast();
      if (action === "calculate") return calculateResult();
      if (!isNaN(value)) return handleNumber(value);
      if (value === ".") return handleDecimal();
      if (["+", "-", "*", "/", "%"].includes(value)) return handleOperator(value);
    });
  });

  window.addEventListener("keydown", (e) => {
    const key = e.key;
    if (!isNaN(key)) handleNumber(key);
    else if (key === ".") handleDecimal();
    else if (["+", "-", "*", "/", "%"].includes(key)) handleOperator(key);
    else if (key === "Enter" || key === "=") {
      e.preventDefault();
      calculateResult();
    } else if (key === "Backspace") {
      deleteLast();
    } else if (key === "Escape") {
      clearAll();
    }
  });

  updateDisplay("0");
  updateHistory("0");
}
