<div class="rounded-lg w-full h-screen bg-[#17151563] fixed left-0 top-0 z-[2000] flex items-center justify-center "
    id="statusModal">
    <div class="bg-white p-10 rounded-lg w-[500px] min-h-[400px] text-center">
        <h3 class="text-dark pb-2 text-xl font-bold sm:text-2xl">
            Choose options
        </h3>
        <span class="bg-primary mx-auto mb-6 inline-block h-1 w-[90px] rounded"></span>
        <p class="mb-6 text-sm">
            Do you want to hide or want to publish <br> this product ?
        </p>
        <form action="{{ route('admin.products.changeStatus') }}" method="post">
            @csrf
            <label for="statusChanger"
                class="block mb-2 text-sm font-medium text-gray-900 text-left">Select an
                status</label>
            <select id="statusChanger"
                class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                name="status">
                <option selected>Choose a status</option>
                <option value="1">Publish</option>
                <option value="0">Hide</option>

            </select>
            <div class="reason-box hidden">

                <label for="reason"
                    class="block mb-2 text-sm font-medium text-gray-900 text-left">Reason</label>
                <textarea id="reason" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="why this post was not approved..." name="reason"></textarea>
            </div>

            <div class="flex gap-5 flex-wrap  mt-3 justify-end">
                <button type="button"
                    class="text-red-700 hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    onclick='$("#statusModal").toggle()'>Close</button>
                <input type="hidden" name="productCode" id="productCode">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Submit</button>
            </div>

        </form>
    </div>
</div>
