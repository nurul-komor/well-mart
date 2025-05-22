@extends('admin.layouts.app-master')
@section('content')
    <!-- table 1 -->
    @include('components.image-modal')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="">Delivery Men</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-3 overflow-x-auto ">
                        <a href="{{ route('delivery_men.register') }}"
                            class="my-3 px-3 py-2 bg-blue-600 inline-block text-white rounded-1 float-right">Add Delivery
                            man</a>
                        <table
                            class="items-center w-full mb-0 align-top border-collapse text-slate-500 mdl-data-table"
                            datatable>
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 text-center">
                                        sl</th>
                                    <th
                                        class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 text-center">
                                        Code</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Name & Email</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Bikash</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Joined</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th>
                                    <!-- <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($delivery_men as $delivery_man)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center ">
                                            {{ $i++ }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            #{{ str_pad($delivery_man->id, 6, 0, STR_PAD_LEFT) }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src=" {{ $delivery_man->image != null ? asset($delivery_man->image) : 'https://ui-avatars.com/api/?name=' . $delivery_man->name }}


                                                "
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                        alt="user1" />
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">
                                                        {{ $delivery_man->name }}</h6>
                                                    <p
                                                        class="mb-0 text-xs leading-tight text-slate-400">
                                                        {{ $delivery_man->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {{ $delivery_man->phone }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {{ $delivery_man->created_at }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">

                                            @if ($delivery_man->status == 'Available')
                                                <p class="chips bg-green-400">Available</p>
                                            @else
                                                <p class="chips bg-yellow-300">Busy</p>
                                            @endif
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a class="" href="">Edit</a>
                                            <form
                                                action="{{ route('admin.delivery_men.destroy', [
                                                    'delivery_man' => $delivery_man->id,
                                                ]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-blue-400 mr-1 underline"
                                                    onclick="return confirm('do you want to remove this delivery man')">Delete</button>
                                            </form>
                                        </td>
                                        <!-- <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                                                                                                                                                                                                                                                                            </td> -->

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('outletcss')
    <style>
        input[type="search"] {
            border: 1px solid;
            margin-right: 10px;
            padding: 3px;
        }
    </style>
@endpush
@push('outletjs')
    <script>
        $(function() {
            $('table').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        })
    </script>
@endpush
