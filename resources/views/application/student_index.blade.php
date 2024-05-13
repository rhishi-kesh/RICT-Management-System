@extends('layout/studentIndex')
@section('content')
    <div>
        <div class="pt-5 m-7">

            <div class="pt-5 ng-tns-c265-3">
                <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4 ng-tns-c265-3">
                    <div class="panel ng-tns-c265-3">
                        <div class="mb-5 flex items-center justify-between ng-tns-c265-3">
                            <h5 class="text-lg font-semibold dark:text-white-light ng-tns-c265-3">Profile</h5><a
                                routerlink="/users/user-account-settings"
                                class="btn btn-primary rounded-full p-2 ltr:ml-auto rtl:mr-auto ng-tns-c265-3"
                                href="{{ route('userProfile') }}"><svg width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg" class="ng-star-inserted">
                                    <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round"></path>
                                    <path
                                        d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5"
                                        d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                </svg><!----></a>
                        </div>
                        <div class="mb-5 ng-tns-c265-3">
                            <div class="flex flex-col items-center justify-center ng-tns-c265-3"><img
                                    src="{{ empty(Auth::Guard('student')->user()->profile) ? url('profile.jpeg') : asset('storage/' . Auth::Guard('student')->user()->profile) }}"
                                    width="100px" height="100px" alt="image" alt="Profile Image"
                                    class="mb-5 h-24 w-24 rounded-full object-cover ng-tns-c265-3">
                                <p class="text-xl font-semibold text-primary ng-tns-c265-3">
                                    {{ Auth::Guard('student')->user()->name }}
                                </p>
                            </div>
                            <ul
                                class="m-auto mt-5 flex max-w-[160px] flex-col space-y-4 font-semibold text-white-dark ng-tns-c265-3">
                                <li class="flex items-center gap-2 ng-tns-c265-3"><svg width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="shrink-0 ng-star-inserted">
                                        <path
                                            d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M7 4V2.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M17 4V2.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M2 9H22" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                    </svg> ID: {{ Auth::Guard('student')->user()->student_id }} </li>
                                <li class="ng-tns-c265-3"><a href="javascript:;"
                                        class="flex items-center gap-2 ng-tns-c265-3"><svg width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 shrink-0 ng-star-inserted">
                                            <path opacity="0.5"
                                                d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path
                                                d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg><!----><!----><!----><span class="truncate text-primary ng-tns-c265-3">
                                            {{ Auth::Guard('student')->user()->email ?? "--" }} </span></a></li>

                                <li class="ng-tns-c265-3"><a href="javascript:;"
                                        class="flex items-center gap-2 ng-tns-c265-3"><svg width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 shrink-0 ng-star-inserted">
                                            <path opacity="0.5"
                                                d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path
                                                d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg><!----><!----><!----><span class="truncate text-primary ng-tns-c265-3">
                                            {{ Auth::Guard('student')->user()->batch->name ?? "--" }} </span></a></li>
                                <li class="flex items-center gap-2 ng-tns-c265-3">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0 ng-star-inserted">
                                        <path
                                            d="M2.3153 12.6978C2.26536 12.2706 2.2404 12.057 2.2509 11.8809C2.30599 10.9577 2.98677 10.1928 3.89725 10.0309C4.07094 10 4.286 10 4.71612 10H15.2838C15.7139 10 15.929 10 16.1027 10.0309C17.0132 10.1928 17.694 10.9577 17.749 11.8809C17.7595 12.057 17.7346 12.2706 17.6846 12.6978L17.284 16.1258C17.1031 17.6729 16.2764 19.0714 15.0081 19.9757C14.0736 20.6419 12.9546 21 11.8069 21H8.19303C7.04537 21 5.9263 20.6419 4.99182 19.9757C3.72352 19.0714 2.89681 17.6729 2.71598 16.1258L2.3153 12.6978Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5"
                                            d="M17 17H19C20.6569 17 22 15.6569 22 14C22 12.3431 20.6569 11 19 11H17.5"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5"
                                            d="M10.0002 2C9.44787 2.55228 9.44787 3.44772 10.0002 4C10.5524 4.55228 10.5524 5.44772 10.0002 6"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M4.99994 7.5L5.11605 7.38388C5.62322 6.87671 5.68028 6.0738 5.24994 5.5C4.81959 4.9262 4.87665 4.12329 5.38382 3.61612L5.49994 3.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M14.4999 7.5L14.6161 7.38388C15.1232 6.87671 15.1803 6.0738 14.7499 5.5C14.3196 4.9262 14.3767 4.12329 14.8838 3.61612L14.9999 3.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    {{ Auth::Guard('student')->user()->course->name ?? "--" }}
                                    
                                </li>

                                <li class="flex items-center gap-2 ng-tns-c265-3"><svg width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="shrink-0 ng-star-inserted">
                                        <path
                                            d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M7 4V2.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M17 4V2.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M2 9H22" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                    </svg> {{ Auth::Guard('student')->user()->dateofbirth }} </li>


                            </ul>
                        </div>
                    </div>
                    <div class="panel lg:col-span-2 xl:col-span-3 ng-tns-c265-3">
                        <div class="mb-5 ng-tns-c265-3">
                            <h5 class="text-lg font-semibold dark:text-white-light ng-tns-c265-3">Task</h5>
                        </div>
                        <div class="mb-5 ng-tns-c265-3">
                            <div class="table-responsive font-semibold text-[#515365] dark:text-white-light ng-tns-c265-3">
                                <table class="whitespace-nowrap ng-tns-c265-3">
                                    <thead class="ng-tns-c265-3">
                                        <tr class="ng-tns-c265-3">
                                            <th class="ng-tns-c265-3">Projects</th>
                                            <th class="ng-tns-c265-3">Progress</th>
                                            <th class="ng-tns-c265-3">Task Done</th>
                                            <th class="text-center ng-tns-c265-3">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="dark:text-white-dark ng-tns-c265-3">
                                        <tr class="ng-tns-c265-3">
                                            <td class="ng-tns-c265-3">Figma Design</td>
                                            <td class="ng-tns-c265-3">
                                                <div
                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40 ng-tns-c265-3">
                                                    <div class="w-[29.56%] rounded-full bg-danger ng-tns-c265-3"></div>
                                                </div>
                                            </td>
                                            <td class="text-danger ng-tns-c265-3">29.56%</td>
                                            <td class="text-center ng-tns-c265-3">2 mins ago</td>
                                        </tr>
                                        <tr class="ng-tns-c265-3">
                                            <td class="ng-tns-c265-3">Vue Migration</td>
                                            <td class="ng-tns-c265-3">
                                                <div
                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40 ng-tns-c265-3">
                                                    <div class="w-1/2 rounded-full bg-info ng-tns-c265-3"></div>
                                                </div>
                                            </td>
                                            <td class="text-success ng-tns-c265-3">50%</td>
                                            <td class="text-center ng-tns-c265-3">4 hrs ago</td>
                                        </tr>
                                        <tr class="ng-tns-c265-3">
                                            <td class="ng-tns-c265-3">Flutter App</td>
                                            <td class="ng-tns-c265-3">
                                                <div
                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40 ng-tns-c265-3">
                                                    <div class="w-[39%] rounded-full bg-warning ng-tns-c265-3"></div>
                                                </div>
                                            </td>
                                            <td class="text-danger ng-tns-c265-3">39%</td>
                                            <td class="text-center ng-tns-c265-3">a min ago</td>
                                        </tr>
                                        <tr class="ng-tns-c265-3">
                                            <td class="ng-tns-c265-3">API Integration</td>
                                            <td class="ng-tns-c265-3">
                                                <div
                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40 ng-tns-c265-3">
                                                    <div class="w-[78.03%] rounded-full bg-success ng-tns-c265-3"></div>
                                                </div>
                                            </td>
                                            <td class="text-success ng-tns-c265-3">78.03%</td>
                                            <td class="text-center ng-tns-c265-3">2 weeks ago</td>
                                        </tr>
                                        <tr class="ng-tns-c265-3">
                                            <td class="ng-tns-c265-3">Blog Update</td>
                                            <td class="ng-tns-c265-3">
                                                <div
                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40 ng-tns-c265-3">
                                                    <div class="w-full rounded-full bg-secondary ng-tns-c265-3"></div>
                                                </div>
                                            </td>
                                            <td class="text-success ng-tns-c265-3">100%</td>
                                            <td class="text-center ng-tns-c265-3">18 hrs ago</td>
                                        </tr>
                                        <tr class="ng-tns-c265-3">
                                            <td class="ng-tns-c265-3">Landing Page</td>
                                            <td class="ng-tns-c265-3">
                                                <div
                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40 ng-tns-c265-3">
                                                    <div class="w-[19.15%] rounded-full bg-danger ng-tns-c265-3"></div>
                                                </div>
                                            </td>
                                            <td class="text-danger ng-tns-c265-3">19.15%</td>
                                            <td class="text-center ng-tns-c265-3">5 days ago</td>
                                        </tr>
                                        <tr class="ng-tns-c265-3">
                                            <td class="ng-tns-c265-3">Shopify Dev</td>
                                            <td class="ng-tns-c265-3">
                                                <div
                                                    class="flex h-1.5 w-full rounded-full bg-[#ebedf2] dark:bg-dark/40 ng-tns-c265-3">
                                                    <div class="w-[60.55%] rounded-full bg-primary ng-tns-c265-3"></div>
                                                </div>
                                            </td>
                                            <td class="text-success ng-tns-c265-3">60.55%</td>
                                            <td class="text-center ng-tns-c265-3">8 days ago</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
