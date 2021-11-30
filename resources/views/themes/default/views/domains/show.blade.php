@extends('layouts.app')
@section('title', $domain->seo_title ?? "{$domain->domain} is on sale")

@section('content')
    <main class="min-h-screen flex bg-gray-50 text-gray-700">
        <div class="w-7/12 flex flex-col justify-between">
            <div class="flex-1 min-h-0 flex items-center py-5 px-4 lg:px-12">
                <div class="space-y-20">
                    <div class="flex flex-col items-center space-y-8">
                        <h1 class="text-6xl font-bold bg-indigo-600 text-white px-4 py-1 rounded-md">For Sale!</h1>
                        <h3 class="text-8xl font-bold text-gray-900">{{ $domain->domain }}</h3>
                        @if($domain->price)
                            <div class="flex items-center text-4xl space-x-4"><span>Estimated value</span> <span class="text-3xl px-4 py-1 bg-red-500 text-white font-semibold rounded">{{ $domain->format_price }}</span></div>
                        @endif
                        <p class="text-2xl text-gray-500 text-center">{{ $domain->description }}</p>
                    </div>
                    <div class="grid grid-cols-3">
                        <div class="text-center space-y-0.5">
                            <h4 class="block text-gray-900 text-4xl font-semibold">1250</h4>
                            <p class="text-xl text-gray-600">Alexa Rank</p>
                        </div>
                        <div class="text-center space-y-0.5">
                            <h4 class="block text-gray-900 text-4xl font-semibold">3500+</h4>
                            <p class="text-xl text-gray-600">Total Back Links</p>
                        </div>
                        <div class="text-center text-gray-900 space-y-0.5">
                            <h4 class="block text-4xl font-semibold">125K</h4>
                            <p class="text-xl text-gray-600">Page Views</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 px-6">
                <div class="grid grid-cols-3 text-md">
                    <div class="flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <span>(+86) 11-2142-566</span>
                    </div>
                    <div class="flex items-center justify-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="mailto:info@mydomain.com" class="hover:text-indigo-500 hover:opacity-90">info@mydomain.com</a>
                    </div>
                    <div class="flex items-center justify-end space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                        </svg>
                        <a href="#" class="hover:text-indigo-500 hover:opacity-90">More Domains</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-5/12 flex flex-col justify-between bg-gray-100">
            <div class="flex-1 min-h-0 flex items-center py-4 px-6 lg:px-20">
                <div>
                    <div class="space-y-6">
                        <div class="space-y-4 text-center">
                            <h3 class="text-4xl text-gray-900">Make Your offer</h3>
                            <p class="text-lg text-gray-500">Please complete the form below and the seller will receive your message.</p>
                        </div>
                        <div class="space-y-6" x-data="offerContainer">
                            <div class="space-y-4">
                                <div class="space-y-1">
                                    <div class="relative">
                                        <input type="text" x-model="form.name" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-10 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="Your Name">
                                        <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="absolute right-0 inset-y-0 w-10 my-px mr-px pt-2 flex items-center justify-center text-2xl font-semibold text-red-500">
                                            <span>*</span>
                                        </div>
                                    </div>
                                    <p class="text-sm text-red-500" x-text-="errors.name && errors.name[0]"></p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <div class="relative">
                                            <input type="text" x-model="form.email" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-10 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="email@example.com">
                                            <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                </svg>
                                            </div>
                                            <div class="absolute right-0 inset-y-0 w-10 my-px mr-px pt-2 flex items-center justify-center text-2xl font-semibold text-red-500">
                                                <span>*</span>
                                            </div>
                                        </div>
                                        <p class="text-sm text-red-500" x-text-="errors.email && errors.email[0]"></p>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="relative">
                                            <input type="text" x-model="form.phone" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-5 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="123 000 0000">
                                            <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <div class="relative">
                                        <input type="text" x-model="form.offer_price" class="w-full block placeholder-gray-400 border border-gray-200 rounded pl-12 pr-24 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="0.00">
                                        <div class="absolute left-0 inset-y-0 w-12 my-px ml-px flex items-center justify-center text-2xl font-semibold text-gray-500">
                                            <span>$</span>
                                        </div>
                                        <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r font-semibold text-gray-500 bg-gray-50 border-l border-gray-200">
                                            <span>USD</span>
                                        </div>
                                        <div class="absolute right-0 inset-y-0 w-10 my-px mr-16 pt-2 flex items-center justify-center text-2xl font-semibold text-red-500">
                                            <span>*</span>
                                        </div>
                                    </div>
                                    <p class="text-sm text-red-500" x-text-="errors.offer_price && errors.offer_price[0]"></p>
                                </div>
                                <div class="space-y-1">
                                    <textarea x-model="form.content" class="w-full block placeholder-gray-400 border border-gray-200 rounded px-5 py-3 leading-6 text-lg focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="Your message or offer details."></textarea>
                                </div>
                            </div>
                            <div class="space-y-6">
                                <button type="button" @click="submitOffer" class="w-full inline-flex justify-center items-center space-x-2 rounded border text-lg font-semibold focus:outline-none px-4 py-3 leading-6 border-indigo-600 bg-indigo-600 text-white hover:text-white hover:bg-indigo-700 hover:border-indigo-700 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-600 active:border-indigo-600 active:shadow-none">
                                    Submit Offer
                                </button>
                                <div class="flex items-center">
                                    <span aria-hidden="true" class="flex-grow bg-gray-200 rounded h-px"></span>
                                    <span class="text-sm font-medium mx-3 text-gray-400">OTHER</span>
                                    <span aria-hidden="true" class="flex-grow bg-gray-200 rounded h-px"></span>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <button type="button" class="w-full inline-flex justify-center items-center space-x-2 rounded border text-lg  focus:outline-none px-4 py-3 leading-6 border-gray-300 bg-white text-gray-800 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:ring focus:ring-gray-500 focus:ring-opacity-50 active:bg-white active:white active:shadow-none">
                                        <span class="text-gray-400">Buy with</span>
                                        <span class="font-semibold">Dan.com</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-2 text-gray-500 text-center">
                © 2021
                <a href="#" class="text-indigo-500 hover:opacity-90">{{ $domain->domain }}</a>
                . All Rights Reserved.
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('offerContainer', () => ({
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    offer_price: '',
                    content: ''
                },
                errors: {},

                submitOffer() {
                    axios.post('{{ route('api.domains.offers.store', $domain) }}', this.form)
                        .then(res => {
                            console.log(res)
                        })
                        .catch((err) => {
                            let res = err.response
                            if(res.status == 422) {
                                this.errors = res.data.errors
                            }
                        })
                }
            }))
        })
    </script>
@endpush
