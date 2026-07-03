from django.db.models import Q
from django.shortcuts import get_object_or_404, redirect, render

from .models import Category, Comment, Post, Tag


def post_list(request):
    """Halaman utama — daftar semua post, dengan filter search / category / tag."""
    query       = request.GET.get("q", "").strip()
    category_id = request.GET.get("category", "").strip()
    tag_id      = request.GET.get("tag", "").strip()

    posts = Post.objects.select_related("author", "category").prefetch_related("tags").order_by("-created_at")

    # ── Filter pencarian teks ─────────────────────────────────────
    if query:
        posts = posts.filter(Q(title__icontains=query) | Q(body__icontains=query))

    # ── Filter by category ────────────────────────────────────────
    active_category = None
    if category_id:
        active_category = get_object_or_404(Category, pk=category_id)
        posts = posts.filter(category=active_category)

    # ── Filter by tag ─────────────────────────────────────────────
    active_tag = None
    if tag_id:
        active_tag = get_object_or_404(Tag, pk=tag_id)
        posts = posts.filter(tags=active_tag)

    # ── Data sidebar ──────────────────────────────────────────────
    categories = Category.objects.all().order_by("name")
    tags       = Tag.objects.all().order_by("name")

    return render(request, "home.html", {
        "posts":           posts,
        "query":           query,
        "categories":      categories,
        "tags":            tags,
        "active_category": active_category,
        "active_tag":      active_tag,
    })


def post_detail(request, pk):
    """Halaman detail satu post beserta form & daftar komentar."""
    post = get_object_or_404(
        Post.objects.select_related("author", "category").prefetch_related("tags"), pk=pk
    )

    if request.method == "POST":
        name = request.POST.get("name", "").strip()
        body = request.POST.get("body", "").strip()

        if name and body:
            Comment.objects.create(post=post, name=name, body=body)

        return redirect(post.get_absolute_url())

    comments = post.comments.all().order_by("-created_at")
    return render(request, "post_detail.html", {"post": post, "comments": comments})
