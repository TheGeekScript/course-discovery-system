$(document).ready(function() {
    function fetchCourses() {
        $.ajax({
            url: '/api/courses',
            method: 'GET',
            success: function(data) {
                $('#course-list').empty();
                data.forEach(course => {
                    $('#course-list').append(`
                        <div class="bg-white p-4 rounded shadow">
                            <h2 class="font-bold text-lg">${course.title}</h2>
                            <p>${course.description}</p>
                            <p class="text-gray-600">Instructor: ${course.instructor}</p>
                            <p class="text-gray-600">Level: ${course.difficulty_level}</p>
                            <p class="text-gray-600">Price: INR ${course.price}</p>
                            <p class="text-gray-600">Category: ${course.category}</p>
                            <p class="text-gray-600">Duration: ${course.duration} minutes</p>
                            <p class="text-gray-600">Rating: ${course.rating} stars</p>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">View Details</button>
                        </div>
                    `);
                });
            },
            error: function() {
                alert('Error fetching courses.');
            }
        });
    }

    fetchCourses();

    $('#search').on('keyup', function() {
        const query = $(this).val();
        $.ajax({
            url: '/api/courses',
            method: 'GET',
            data: { search: query },
            success: function(data) {
                $('#course-list').empty();
                data.forEach(course => {
                    $('#course-list').append(`
                        <div class="bg-white p-4 rounded shadow">
                            <h2 class="font-bold text-lg">${course.title}</h2>
                            <p>${course.description}</p>
                            <p class="text-gray-600">Instructor: ${course.instructor}</p>
                            <p class="text-gray-600">Level: ${course.difficulty_level}</p>
                            <p class="text-gray-600">Price: INR ${course.price}</p>
                            <p class="text-gray-600">Category: ${course.category}</p>
                            <p class="text-gray-600">Duration: ${course.duration} minutes</p>
                            <p class="text-gray-600">Rating: ${course.rating} stars</p>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">View Details</button>
                        </div>
                    `);
                });
            },
            error: function() {
                alert('Error fetching courses.');
            }
        });
    });

    $('#filter-button').on('click', function() {
        const category = $('#category-filter').val();
        const price = $('#price-filter').val();
        const difficulty = $('#difficulty-filter').val();
        const duration = $('#duration-filter').val();
        const rating = $('#rating-filter').val();
        const format = $('#format-filter').val();
        const certification = $('#certification-filter').val();
        const releaseDate = $('#release-date-filter'). val();
        const popularity = $('#popularity-filter').val();
    
        $.ajax({
            url: '/api/courses',
            method: 'GET',
            data: {
                category: category,
                price: price,
                difficulty: difficulty,
                duration: duration,
                rating: rating,
                format: format,
                certification: certification,
                release_date: releaseDate,
                popularity: popularity
            },
            success: function(data) {
                $('#course-list').empty();
                data.forEach(course => {
                    $('#course-list').append(`
                        <div class="bg-white p-4 rounded shadow">
                            <h2 class="font-bold text-lg">${course.title}</h2>
                            <p>${course.description}</p>
                            <p class="text-gray-600">Instructor: ${course.instructor}</p>
                            <p class="text-gray-600">Level: ${course.difficulty_level}</p>
                            <p class="text-gray-600">Price: INR ${course.price}</p>
                            <p class="text-gray-600">Category: ${course.category}</p>
                            <p class="text-gray-600">Duration: ${course.duration} minutes</p>
                            <p class="text-gray-600">Rating: ${course.rating} stars</p>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">View Details</button>
                        </div>
                    `);
                });
            },
            error: function(error) {
                console.error('Error fetching courses:', error);
            }
        });
    });
});