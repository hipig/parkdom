@extends('layouts.admin')
@section('title', '设置-邮箱')

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3>邮箱设置</h3>
        </div>
        <form action="{{ route('admin.settings.mail') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="driver" class="text-gray-900 font-semibold">邮箱驱动</label>
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center">
                                <input type="radio" id="driver" value="smtp" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" checked="checked" />
                                <span class="ml-2">SMTP</span>
                            </label>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label for="host" class="text-gray-900 font-semibold">服务器</label>
                        <input type="text" id="host" name="host" value="{{ old('host', $setting->host) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入邮箱服务器">
                    </div>
                    <div class="space-y-1">
                        <label for="port" class="text-gray-900 font-semibold">端口</label>
                        <input type="text" id="port" name="port" value="{{ old('port', $setting->port) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入端口">
                    </div>
                    <div class="space-y-1">
                        <label for="encryption" class="text-gray-900 font-semibold">加密方式</label>
                        <input type="text" id="encryption" name="encryption" value="{{ old('encryption', $setting->encryption) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入加密方式">
                    </div>
                    <div class="space-y-1">
                        <label for="username" class="text-gray-900 font-semibold">账户名</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $setting->username) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入账户名">
                    </div>
                    <div class="space-y-1">
                        <label for="password" class="text-gray-900 font-semibold">密码</label>
                        <input type="password" id="password" name="password" value="{{ old('password', $setting->password) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入密码">
                    </div>
                    <div class="space-y-1">
                        <label for="name" class="text-gray-900 font-semibold">发件人</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $setting->name) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入发件人">
                    </div>
                    <div class="space-y-1">
                        <label for="address" class="text-gray-900 font-semibold">发件人邮箱</label>
                        <input type="text" id="address" name="address" value="{{ old('host', $setting->address) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入发件人邮箱">
                    </div>
                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50 space-x-2" x-data>
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    确定
                </button>
                <button type="button" @click="$dispatch('open-modal', { open: true })" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-green-700 bg-green-700 text-white hover:text-white hover:bg-green-800 hover:border-green-800 focus:ring focus:ring-green-500 focus:ring-opacity-50 active:bg-green-700 active:border-green-700">
                    发送测试邮件
                </button>
            </div>
        </form>
    </div>

    <div x-data="mailContainer" x-cloak>
        <div
            x-show="open"
            @open-modal.window="showModal($event.detail)"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="transform opacity-100"
            x-transition:leave-end="transform opacity-0"
            class="z-90 fixed inset-0 overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-75 p-4 lg:p-8"
        >
            <div
                class="flex flex-col rounded shadow-sm bg-white overflow-hidden w-full max-w-md mx-auto"
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-125"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-125"
                @click.outside="closeModal"
            >
                <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 flex justify-between items-center">
                    <h3 class="font-medium">
                        发送测试邮件
                    </h3>
                    <div class="-my-4">
                        <button
                            type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-transparent text-gray-600 hover:text-gray-400 focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:text-gray-600"
                            @click="closeModal"
                        >
                            <svg class="hi-solid hi-x inline-block w-4 h-4 -mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                    </div>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="p-5 lg:p-6 flex-grow w-full">
                        <div class="space-y-6">
                            <div class="space-y-1">
                                <label for="test_email" class="text-gray-900 font-semibold">邮箱地址</label>
                                <input type="text" id="test_email" name="test_email" value="{{ old('test_email') }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入邮箱地址">
                            </div>
                        </div>
                    </div>
                    <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 text-right space-x-1">
                        <button
                            type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm rounded border-transparent text-indigo-600 hover:text-indigo-400 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:text-indigo-600"
                            @click="closeModal"
                        >
                            取消
                        </button>
                        <button
                            type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700"
                            @click="closeModal"
                        >
                            提交
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mailContainer', () => ({
                open: false,

                showModal(detail) {
                    this.open = !!detail.open
                },
                closeModal() {
                    this.open = false
                }
            }))
        })
    </script>
@endpush
