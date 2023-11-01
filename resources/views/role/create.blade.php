<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Role Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex items-center justify-between p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <h2>Role Create</h2>
                    <a href="{{ route('roles.index') }}">
                        <button type="button"
                            class="text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            All Roles
                        </button>
                    </a>
                </div>
                <form action="{{ route('roles.store') }}" method="POST" class="p-4">
                    @csrf
                    <div class="mb-4">
                        <label for="name"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">Name</label>
                        <input type="text" value="{{ old('name') }}" id="name" name="name"
                            class="@error('name') border-red-500 @enderror pl-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Role Name">
                        @error('name')
                            <div class="text-sm font-semibold text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex gap-6 px-6 py-4 mb-6 text-gray-900 dark:text-gray-300">
                        @foreach ($permissions as $permission)
                            <div
                                class="pt-2 text-sm leading-normal text-gray-500 focus:outline-none dark:text-gray-200 ">
                                <div class="ml-3 role-management-checkbox">
                                    <input onclick="checksinglepermission('role-management-checkbox','management')"
                                        name="permissions[]" id="permission_{{ $permission->id }}"
                                        value="{{ $permission->id }}" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="permission_{{ $permission->id }}"
                                        class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                        {{ $permission->name }} <br>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- <div class="flex flex-wrap gap-6 mb-4">
                        <div class="px-6 py-4 mb-2 bg-white rounded-md shadow-sm lg:w-80 lg:mb-0 dark:bg-gray-800">
                            <div class="pb-2 border-b">
                                <input id="management" type="checkbox" onclick="CheckPermissionByGroup('role-management-checkbox',this)" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="management" class="ml-2 text-lg font-medium text-gray-900 select-none dark:text-gray-300">
                                    Select All
                                </label>
                            </div>
                          
                        </div>
                        <div class="px-6 py-4 bg-white rounded-md shadow-sm lg:w-80 dark:bg-gray-800">
                            <div class="pb-2 border-b">
                                <input id="management" type="checkbox" onclick="CheckPermissionByGroup('role-management-checkbox',this)" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="management" class="ml-2 text-lg font-medium text-gray-900 select-none dark:text-gray-300">
                                    Select All
                                </label>
                            </div>
                            <div class="pt-2 text-sm leading-normal text-gray-500 focus:outline-none dark:text-gray-200 ">
                                <div class="ml-3 role-management-checkbox">
                                    <input onclick="checksinglepermission('role-management-checkbox','management')"
                                        name="permissions[]"
                                        id="permission_checkbox"
                                        value="" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="permission_checkbox" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                        Lorem Ipsum Dollar set <br>
                                    </label>
                                </div>
                                <div class="ml-3 role-management-checkbox">
                                    <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission_checkbox2" value="" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="permission_checkbox2" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                        Lorem Ipsum Dollar set <br>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-white rounded-md shadow-sm lg:w-80 dark:bg-gray-800">
                            <div class="pb-2 border-b">
                                <input id="management" type="checkbox" onclick="CheckPermissionByGroup('role-management-checkbox',this)" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="management" class="ml-2 text-lg font-medium text-gray-900 select-none dark:text-gray-300">
                                    Select All
                                </label>
                            </div>
                            <div class="pt-2 text-sm leading-normal text-gray-500 focus:outline-none dark:text-gray-200 ">
                                <div class="ml-3 role-management-checkbox">
                                    <input onclick="checksinglepermission('role-management-checkbox','management')"
                                        name="permissions[]"
                                        id="permission_checkbox"
                                        value="" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="permission_checkbox" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                        Lorem Ipsum Dollar set <br>
                                    </label>
                                </div>
                                <div class="ml-3 role-management-checkbox">
                                    <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission_checkbox2" value="" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="permission_checkbox2" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                        Lorem Ipsum Dollar set <br>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit"
                        class="mb-4 text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $('#permission_all').on('click', function() {
        if ($(this).is(':checked')) {
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        } else {
            // uncheck all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

    // check permission by group
    function CheckPermissionByGroup(classname, checkthis) {
        const groupIdName = $("#" + checkthis.id);
        const classCheckBox = $('.' + classname + ' input');
        if (groupIdName.is(':checked')) {
            // check all the checkbox
            classCheckBox.prop('checked', true);
        } else {
            // uncheck all the checkbox
            classCheckBox.prop('checked', false);
        }
        implementallcheck();
    }

    function checksinglepermission(groupClassname, groupId, countTotalPermission) {
        const classCheckbox = $('.' + groupClassname + ' input');
        const groupIDCheckBox = $('#' + groupId);

        // if there is any occurance where somthing is not selected then make select check
        if ($('.' + groupClassname + ' input:checked').length == countTotalPermission) {
            groupIDCheckBox.prop('checked', true);
        } else {
            groupIDCheckBox.prop('checked', false);
        }
        implementallcheck();
    }

    function implementallcheck() {
        const countPermisssions = 5;
        const countPermisssionsGroup = 3;
        var amount = countPermisssions + countPermisssionsGroup;

        var checkbox = $("input:checked").length;

        if (amount == checkbox) {
            $('#permission_all').prop('checked', true);
        } else {
            $('#permission_all').prop('checked', false);
        }
    }
</script>
