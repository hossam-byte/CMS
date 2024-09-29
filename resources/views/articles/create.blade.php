<!-- resources/views/article/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Article</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css">
</head>
<body>
<div class="max-w-2xl mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Submit Your Article</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium">Author Name</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Author Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Article Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium">Article Content</label>
            <textarea id="content" name="content" class="border rounded w-full py-2 px-3" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium">Category</label>
            <select id="category" name="category" class="border rounded w-full py-2 px-3" required>
                <option value="">Select a category</option>
                <option value="technology">Technology</option>
                <option value="business">Business</option>
                <option value="health">Health</option>
                <option value="education">Education</option>
                <option value="lifestyle">Lifestyle</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium">Tags (comma-separated)</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags') }}" class="border rounded w-full py-2 px-3">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Article</button>
    </form>
</div>
</body>
</html>
