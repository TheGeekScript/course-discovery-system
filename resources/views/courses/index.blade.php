<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Discovery System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Course Discovery System</h1>
        <div class="mb-4">
            <input type="text" id="search" placeholder="Search courses..." class="border p-2 w-full">
        </div>
        <div id="filters" class="mb-4">
            <div class="flex flex-col md:flex-row md:space-x-2">
                <select id="category-filter" class="border p-2">
                    <option value="">Categories</option>
                    <option value="Programming">Programming</option>
                    <option value="Design">Design</option>
                    <option value="Business">Business</option>
                    <option value="Marketing">Marketing</option>
                </select>
        
                <select id="price-filter" class="border p-2">
                    <option value="">Prices</option>
                    <option value="free">Free</option>
                    <option value="paid">Paid</option>
                    <option value="range">Price Range (1k - 3k)</option>
                </select>
        
                <select id="difficulty-filter" class="border p-2">
                    <option value="">Levels</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
        
                <select id="duration-filter" class="border p-2">
                    <option value="">Durations</option>
                    <option value="<2">< 2 hours</option>
                    <option value="2-5">2-5 hours</option>
                    <option value="5-10">5-10 hours</option>
                    <option value=">10">> 10 hours</option>
                </select>
        
                <select id="rating-filter" class="border p-2">
                    <option value="">Ratings</option>
                    <option value="4+">4+ stars</option>
                    <option value="3+">3+ stars</option>
                    <option value="2">2 stars and below</option>
                </select>
        
                <select id="format-filter" class="border p-2">
                    <option value="">Formats</option>
                    <option value="Video">Video</option>
                    <option value="Text-based">Text-based</option>
                    <option value="Interactive">Interactive/Live</option>
                </select>
        
                <select id="certification-filter" class="border p-2">
                    <option value="">Certifications</option>
                    <option value="available">Certification Available</option>
                    <option value="not_available">No Certification</option>
                </select>
        
                <select id="release-date-filter" class="border p-2">
                    <option value="">Release Dates</option>
                    <option value="30_days">Last 30 days</option>
                    <option value="6_months">Last 6 months</option>
                    <option value="1_year">Last 1 year</option>
                </select>
        
                <select id="popularity-filter" class="border p-2">
                    <option value="">Popularity</option>
                    <option value="most_enrolled">Most Enrolled</option>
                    <option value="trending">Trending</option>
                    <option value="recently_viewed">Recently Viewed</option>
                </select>
        
                <button id="filter-button" class="bg-green-500 text-white px-2 py-2 rounded">Apply</button>
            </div>
        </div>
        <div id="course-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Course cards will be populated here -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app.js"></script>
</body>
</html>