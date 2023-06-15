<div class="fixed top-0 left-0 h-full w-full pt-10 px-5  bg-blue-300/30 z-100 font-montserrat hide" id="search-box">
    <div class="px-4 w-full mx-auto  md:max-w-[600px] bg-gray-100  p-3 rounded-2 min-h-[300px] relative ">
        <div class="flex justify-end mb-2">
            <kbd class="kbd shadow text-gray-500 text-sm search-btn cursor-pointer">Esc</kbd>
        </div>
        <div class="rounded  ring-4 ring-green-300 flex justify-center">
            <span
                class="bg-white py-3 px-3 font-bold text-2xl grid place-content-center text-commonPrimaryDark rounded-2">
                <ion-icon name="search"></ion-icon>
            </span>
            <input type="text" class="w-full py-3 px-3 focus:ring-0 border-0 outline-none rounded-2"
                placeholder="Search here" id="search-input">
        </div>
        <div id="search-results" role="listbox"
            class=" z-10 min-h-12 mt-4 rounded-md h-full  max-h-[75vh] overflow-y-scroll small-scrollbar flex flex-col gap-4 pb-[100px]">

        </div>
        <div
            class="flex justify-between items-center flex-wrap bg-white absolute bottom-0 left-0 rounded-b-2 w-full text-gray-400 drop-shadow-xl">
            <div class="px-5 py-3 ">
                <kbd class="kbd shadow font-semibold">
                    <ion-icon name="chevron-down"></ion-icon>
                </kbd>
                <kbd class="kbd shadow font-semibold">
                    <ion-icon name="chevron-up"></ion-icon>
                </kbd>
                <small class="px-3  ">to navigate</small>
            </div>
            <div class="px-5 py-3 inline-flex">
                <small class="px-3  ">Search by</small>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Algolia-logo.svg/1280px-Algolia-logo.svg.png"
                    class="h-5" alt="algolia">
            </div>
        </div>
    </div>
</div>


@push('algoliaJS')
    <script>
        $(document).ready(function() {
            // showing searchbox by clicking search icon
            $('.search-btn').on('click', function() {
                $("#search-box").toggleClass("show")
                $('body').toggleClass("overflow-hidden")
            })
            // showing searchbox on clicking esc button
            $(document).on('keydown', function(e) {
                if (e.key == "Escape") {
                    $("#search-box").toggleClass("show")
                    $('body').toggleClass("overflow-hidden")
                }
            })

            let url = $("meta[name='app-url']").attr('content')
            const searchInput = $('#search-input');
            const searchResults = $('#search-results');


            searchInput.on('input', function() {
                const query = $(this).val();
                if (query.length >= 1) {
                    $.ajax({
                        url: `/api/search/`,
                        method: 'GET',
                        data: {
                            query: query
                        },
                        beforeSend: function() {
                            searchResults.html(
                                '<p class="px-4 py-2 text-gray-500">Loading...</p>'
                            );
                        },
                        success: function(response) {
                            var products = ""
                            var news = "";
                            // searchResults.empty();
                            if (response.total > 0) {
                                $.each(response.results, function(index, value) {
                                    console.log(value.status)
                                    if (value.status == 'active' && value.url ==
                                        '/news/') {
                                        news += (`<a href="${value.url+value.title}" class="w-full flex p-3 bg-white text-gray-600 cursor-pointer hover:bg-commonPrimary hover:text-white focus:bg-commonPrimary focus:text-white rounded">
                                            <img src="${url}/${value.image}"
                                                    alt="" class="h-[70px] w-[70px] object-cover rounded shadow ">
                                             <div class="px-5 py-2">
                                                  <p class=" font-bold text-limit-1 m-0">${value.title}</p>
                                                    <p class="text-limit-1 m-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                   Quas, culpa!
                                                  </p>
                                               </div>
                                           </a>`)
                                    } else if (value.status == 1 && value.url ==
                                        '/products/singleProduct/') {
                                        products += (`<a href="${value.url+value.product_code}" class="w-full flex p-3 bg-white text-gray-600 cursor-pointer hover:bg-commonPrimary hover:text-white focus:bg-commonPrimary focus:text-white rounded">
                                            <img src="${url}/${value.productImage}"
                                                    alt="" class="h-[70px] w-[70px] object-cover rounded shadow ">
                                             <div class="px-5 py-2">
                                                  <p class=" font-bold  m-0">${value.productName}</p>
                                                    <p class=" m-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                   Quas, culpa!
                                                  </p>
                                               </div>
                                         </a>`)
                                    }

                                })
                                news = news == "" ? "" :
                                    "<b class='m-0  text-commonPrimaryDark'>News</b>" +
                                    news
                                products = products == "" ? "" :
                                    "<b class='m-0  text-commonPrimaryDark'>Products</b>" +
                                    products
                                searchResults.html(products + news)
                            } else {
                                searchResults.html(
                                    '<p class="px-4 py-2 text-gray-800">No results found.</p>'
                                );
                            }


                            searchResults.show();

                            // selecting items of list using arrow keys
                            var currentItem = 0;
                            var listItems = $('#search-results a');
                            console.log(listItems)
                            listItems.eq(currentItem).focus();

                            $(document).keydown(function(e) {
                                listItems.eq(currentItem).focus();

                                if (e.keyCode === 38) { // Up arrow
                                    currentItem = (currentItem - 1 + listItems.length) %
                                        listItems.length;
                                } else if (e.keyCode === 40) { // Down arrow
                                    currentItem = (currentItem + 1) % listItems.length;
                                }

                                listItems.eq(currentItem).focus();
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    searchResults.hide();
                }
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('#search-results').length && !$(event.target).closest(
                        '#search-input').length) {
                    // searchResults.hide();
                }
            });

        });
    </script>
@endpush
