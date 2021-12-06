@extends('layouts.admin')
@section('title', '个人资料')

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3 class="flex items-center space-x-2">
                <span>个人资料</span>
            </h3>
        </div>
        <form action="{{ route('admin.profile.update') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div  class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="name" class="font-semibold text-gray-900">用户名</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="block border border-gray-200 bg-gray-100 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入用户名" readonly />
                    </div>
                    <div class="space-y-1">
                        <label for="password" class="font-semibold text-gray-900">密码</label>
                        <input type="password" id="password" name="password" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入密码" />
                    </div>
                    <div class="space-y-1">
                        <label for="password_confirmation" class="font-semibold text-gray-900">确认密码</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入确认密码" />
                    </div>
                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    确定
                </button>
                <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    返回
                </button>
            </div>
        </form>
    </div>
@endsection
