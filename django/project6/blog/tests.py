from django.contrib.auth import get_user_model
from django.test import TestCase
from django.urls import reverse

from .models import Category, Comment, Post, Tag


class BlogTests(TestCase):
    @classmethod
    def setUpTestData(cls):
        cls.user = get_user_model().objects.create_user(
            username="testuser", email="test@email.com", password="secret"
        )
        cls.post = Post.objects.create(
            title="A good title",
            body="Nice body content",
            author=cls.user,
        )
        cls.second_post = Post.objects.create(
            title="Another article",
            body="Different body",
            author=cls.user,
        )

    def test_post_model(self):
        self.assertEqual(self.post.title, "A good title")
        self.assertEqual(self.post.body, "Nice body content")
        self.assertEqual(self.post.author.username, "testuser")
        self.assertEqual(str(self.post), "A good title")
        self.assertEqual(self.post.get_absolute_url(), "/post/1/")

    def test_url_exists_at_correct_location_listview(self):
        response = self.client.get("/")
        self.assertEqual(response.status_code, 200)

    def test_url_exists_at_correct_location_detailview(self):
        response = self.client.get("/post/1/")
        self.assertEqual(response.status_code, 200)

    def test_post_listview(self):
        response = self.client.get(reverse("home"))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, "Nice body content")
        self.assertTemplateUsed(response, "home.html")

    def test_post_detailview(self):
        response = self.client.get(reverse("post_detail", kwargs={"pk": self.post.pk}))
        no_response = self.client.get("/post/100000/")
        self.assertEqual(response.status_code, 200)
        self.assertEqual(no_response.status_code, 404)
        self.assertContains(response, "A good title")
        self.assertTemplateUsed(response, "post_detail.html")

    def test_search_filters_posts(self):
        response = self.client.get(reverse("home") + "?q=nice")
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, "Nice body content")
        self.assertNotContains(response, "Another article")

    def test_post_detail_displays_comments_and_new_comment(self):
        response = self.client.post(
            reverse("post_detail", kwargs={"pk": self.post.pk}),
            {"name": "Alice", "body": "This is a test comment"},
            follow=True,
        )
        self.assertEqual(response.status_code, 200)
        self.assertEqual(Comment.objects.count(), 1)
        self.assertContains(response, "This is a test comment")

    def test_post_detail_shows_category_tag_and_cover_image(self):
        category = Category.objects.create(name="Django")
        tag = Tag.objects.create(name="Tutorial")
        self.post.category = category
        self.post.cover_image = "https://example.com/cover.jpg"
        self.post.save()
        self.post.tags.add(tag)

        response = self.client.get(reverse("post_detail", kwargs={"pk": self.post.pk}))

        self.assertContains(response, "Django")
        self.assertContains(response, "Tutorial")
        self.assertContains(response, 'src="https://example.com/cover.jpg"')
