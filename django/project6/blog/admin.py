from django.contrib import admin
from django.contrib.auth.models import Group
from .models import Category, Post, Tag

# Sembunyikan Group dari sidebar admin
admin.site.unregister(Group)



# ─── Category Admin ───────────────────────────────────────────────────────────
@admin.register(Category)
class CategoryAdmin(admin.ModelAdmin):
    list_display  = ("name", "post_count")
    search_fields = ("name",)
    ordering      = ("name",)

    def post_count(self, obj):
        return obj.posts.count()
    post_count.short_description = "Jumlah Post"


# ─── Tag Admin ────────────────────────────────────────────────────────────────
@admin.register(Tag)
class TagAdmin(admin.ModelAdmin):
    list_display  = ("name", "post_count")
    search_fields = ("name",)
    ordering      = ("name",)

    def post_count(self, obj):
        return obj.posts.count()
    post_count.short_description = "Jumlah Post"


# ─── Post Admin ───────────────────────────────────────────────────────────────
@admin.register(Post)
class PostAdmin(admin.ModelAdmin):
    list_display   = ("title", "author", "category", "created_at", "has_cover", "tag_list")
    list_filter    = ("author", "category", "tags", "created_at")
    search_fields  = ("title", "body", "author__username")
    ordering       = ("-created_at",)
    date_hierarchy = "created_at"

    # Menggunakan autocomplete_fields agar tampil sebagai dropdown yang rapi
    autocomplete_fields = ("author", "category", "tags")

    fieldsets = (
        ("Informasi Utama", {
            "fields": ("title", "author", "body"),
        }),
        ("Kategorisasi", {
            "fields": ("category", "tags"),
            "description": "Pilih category (satu) dan tags (bisa lebih dari satu).",
        }),
        ("Media", {
            "fields": ("cover_image",),
            "description": "Masukkan URL gambar untuk dijadikan cover post.",
        }),
    )

    # ── Helper columns ──────────────────────────────────────────────────
    def has_cover(self, obj):
        return bool(obj.cover_image)
    has_cover.boolean     = True
    has_cover.short_description = "Cover?"

    def tag_list(self, obj):
        return ", ".join(t.name for t in obj.tags.all()) or "—"
    tag_list.short_description = "Tags"
