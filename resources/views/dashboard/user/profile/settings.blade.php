    @extends('dashboard.user.profile.layouts.layout')
    @section('content')
    @section('page_title')
    {{ "Profile Settings" }}
    @endsection
        <link rel="stylesheet" href="/css/profile/settings.css">
        {{-- get url --}}
        <input type="hidden" value="{{ url('') }}" id="url">
        {{-- Center SideBar Content --}}
        <div class="content-wrapper">
            {{-- Header content --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ __('UserProfilesettings.Home') }}</h1>
                        </div>

                    </div>
                </div>
            </div>

            {{-- main-content --}}
            <div class="content">
                <div class="container-fluid">

                    <div class="success_messages"></div>

                    <div class="row d-flex justify-content-around ml-4 mt-5">

                        <div class="col-md-4">
                            <div class="titleInfo">{{ __('UserProfilesettings.Fullname') }}</div>
                            <div class="contentInfo mt-1">
                                <div class="showcontent" style="display: none">
                                    <a href="#" class="d-block mb-2" id="showFullName"></a>
                                    <div class="edit">
                                        <div class="plusIcon">
                                            <i class="showFullNameModalButton fa-light fa-plus" data-target="#editFullName">
                                            </i>
                                        </div>
                                        <!-- Button trigger edit modal -->
                                        <a href="#" class="showFullNameModalButton TextAddButton ml-3"
                                            data-target="#editFullName">{{ __('UserProfilesettings.Edit Fullname') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!--Edit Fullname Modal -->
                            <div class="modal fade" id="editFullName" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title">{{ __('UserProfilesettings.Edit Fullname') }}</h2>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span class="XCloseModal" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="saveForm_errList_fullname"></ul>
                                            <form action="" method="POST" id="form_edit_fullname">
                                                @csrf
                                                <input type="hidden" class="idToken" value="{{ csrf_token() }}">
                                                <input type="hidden" name="customer_id" class="customer_id" value="">
                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.Fullname') }}</label>
                                                    <input type="text" id="fullnameEdit" name="fullname"
                                                        class="form-control formRound" value=""
                                                        placeholder="Enter your fullname here">
                                                    {{-- show error message --}}
                                                    <span class="text-danger">
                                                        @error('fullname')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <button type="submit" id="updateFullnameBtn"
                                                    class=" btn btn-primary submitButton formRound">{{ __('UserProfilesettings.UPDATE') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- END Fullname --}}

                        <div class="col-md-4">
                            <div class="titleInfo">{{ __('UserProfilesettings.Address') }}</div>
                            <div class="contentInfo mt-1">


                                <div class="showcontent" style="display: none">
                                    <a href="#" class="d-block mb-2" id="showAddress"></a>
                                    <div class="edit">
                                        <div class="plusIcon">
                                            <i class="showAddressModalButton fa-light fa-plus" data-target="#editAddress">
                                            </i>
                                        </div>
                                        <!-- Button trigger edit modal -->
                                        <a href="#" class="showAddressModalButton TextAddButton ml-3"
                                            data-target="#editAddress">{{ __('UserProfilesettings.Edit Address') }}</a>
                                    </div>
                                </div>

                            </div>
                            <!--Edit Address Modal -->
                            <div class="modal fade" id="editAddress" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('UserProfilesettings.Edit Address') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span class="XCloseModal" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="saveForm_errList_address"></ul>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" class="idToken" value="{{ csrf_token() }}">
                                                <input type="hidden" name="customer_id" class="customer_id" value="">
                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.Address') }}</label>
                                                    <input type="text" name="address" id="addressEdit"
                                                        class="form-control formRound" value=""
                                                        placeholder="Enter your address here">
                                                    {{-- show error message --}}
                                                    <span class="text-danger">
                                                        @error('address')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <button type="submit" class="btn btn-primary submitButton formRound"
                                                    id="updateAddressBtn">{{ __('UserProfilesettings.UPDATE') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="titleInfo">{{ __('UserProfilesettings.PhoneNumber') }}</div>
                            <div class="contentInfo mt-1">
                                <div class="showcontent" style="display: none">
                                    <a href="#" class=" d-block mb-2" id="showPhone"></a>
                                    <div class="edit">
                                        <div class="plusIcon">
                                            <i class="showPhoneModalButton fa-light fa-plus" data-target="#editPhoneNumber">
                                            </i>
                                        </div>
                                        <!-- Button trigger edit modal -->
                                        <a href="#" class="showPhoneModalButton TextAddButton ml-3"
                                            data-target="#editPhoneNumber">{{ __('UserProfilesettings.Edit Phone Number') }}</a>
                                    </div>
                                </div>

                            </div>
                            <!--Edit Phone Number Modal -->
                            <div class="modal fade" id="editPhoneNumber" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('UserProfilesettings.Edit Phone Number') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span class="XCloseModal" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="saveForm_errList_phoneNumber"></ul>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" class="idToken" value="{{ csrf_token() }}">
                                                <input type="hidden" name="customer_id" class="customer_id" value="">
                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.PhoneNumber') }}</label>
                                                    <input type="text" name="phonenumber" id="phoneNumberEdit"
                                                        class="form-control formRound" value=""
                                                        placeholder="Enter your phone here">
                                                    {{-- show error message --}}
                                                    <span class="text-danger">
                                                        @error('phonenumber')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <button type="submit" class="btn btn-primary submitButton formRound"
                                                    id="updatePhoneBtn">{{ __('UserProfilesettings.UPDATE') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row d-flex justify-content-around ml-4 mt-5">
                        <div class="col-md-4">
                            <div class="titleInfo">{{ __('UserProfilesettings.Email') }}</div>
                            <div class="contentInfo mt-1">
                                <div class="showcontent" style="display: none">
                                    <a href="#" class="d-block mb-2" id="showEmail"></a>
                                    @if (Auth::user()->google_id == null)
                                        <div class="edit">
                                            <div class="plusIcon">
                                                <i class="showEmailModalButton fa-light fa-plus" data-target="#editEmail">
                                                </i>
                                            </div>
                                            <!-- Button trigger edit modal -->
                                            <a href="#" class="showEmailModalButton TextAddButton ml-3"
                                                data-target="#editEmail ">{{ __('UserProfilesettings.Edit Email') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Edit Email Modal -->
                            <div class="modal fade" id="editEmail" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('UserProfilesettings.Edit Email') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span class="XCloseModal" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="saveForm_errList_email"></ul>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" class="idToken" value="{{ csrf_token() }}">
                                                <input type="hidden" name="customer_id" class="customer_id" value="">
                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.Email') }}</label>
                                                    <input type="email" name="email" id="emailEdit"
                                                        class="form-control formRound" value=""
                                                        placeholder="Enter your email here">
                                                    {{-- show error message --}}
                                                    <span class="text-danger">
                                                        @error('email')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.Current Password') }}</label>
                                                    <input type="password" name="password" id="change_currentPassWord"
                                                        class="form-control formRound" value=""
                                                        placeholder="Enter your password here">

                                                    <span class="text-danger">
                                                        @error('password')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <button type="submit" class="btn btn-primary submitButton formRound"
                                                    id="updateEmailBtn">{{ __('UserProfilesettings.UPDATE') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="col-md-4">
                            <div class="titleInfo">{{ __('UserProfilesettings.Password') }}</div>
                            <div class="contentInfo mt-1">
                                <div class="showcontent" style="display: none">
                                    <a href="#" class="d-block mb-2 showContent">* * * * * * * * * * * *</a>
                                    
                                        <div class="edit">
                                            <div class="plusIcon">
                                                <i class="showPasswordModalBtn fa-light fa-plus" data-target="#changePassword">
                                                </i>
                                            </div>
                                            <!-- Button trigger edit modal -->
                                            <a href="#" class="showPasswordModalBtn TextAddButton ml-3"
                                                data-target="#changePassword ">{{ __('UserProfilesettings.Change Password') }}</a>
                                        </div>
                                   
                                </div>
                            </div>


                            <!-- Edit Password Modal -->
                            <div class="modal fade" id="changePassword" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('UserProfilesettings.Change Password') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span class="XCloseModal" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="saveForm_errList_password"></ul>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" class="idToken" value="{{ csrf_token() }}">
                                                <input type="hidden" name="customer_id" class="customer_id" value="">
                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.Current Password') }}</label>
                                                    @if(App::getLocale() == 'vi')
                                                    <input type="password" name="mật_khẩu_hiện_tại" id="currentpassword"
                                                    class="form-control formRound" value=""
                                                    placeholder="{{ __('UserProfilesettings.Enter your current password')}}" required>
                                                    @else
                                                    <input type="password" name="currentpassword" id="currentpassword"
                                                        class="form-control formRound" value=""
                                                        placeholder="{{ __('UserProfilesettings.Enter your current password')}}" required>

                                                    @endif

                                                    <span class="text-danger">
                                                        @error('currentpassword')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.New Password') }}</label>
                                                    

                                                        @if(App::getLocale() == 'vi')
                                                        <input type="password" name="mật_khẩu_mới" id="newpassword"
                                                        class="form-control formRound" value=""
                                                        placeholder="{{__('UserProfilesettings.Enter your new password')}}" required>
                                                        @else
                                                        <input type="password" name="newpassword" id="newpassword"
                                                        class="form-control formRound" value=""
                                                        placeholder="{{__('UserProfilesettings.Enter your new password')}}" required>
                                                        @endif
    
                                                    <span class="text-danger">
                                                        @error('newpassword')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.Confirm New Password') }}</label>

                                                    @if(App::getLocale() == 'vi')
                                                    <input type="password" name="xác_nhận_mật_khẩu" id="confirm_newpassword"
                                                    class="form-control formRound" value=""
                                                    placeholder="{{ __('UserProfilesettings.Confirm your new password') }}" required>
                                                    @else
                                                    <input type="password" name="confirm_newpassword" id="confirm_newpassword"
                                                    class="form-control formRound" value=""
                                                    placeholder="{{ __('UserProfilesettings.Confirm your new password') }}" required>
                                                    @endif
                                                   

                                                    <span class="text-danger">
                                                        @error('confirm_newpassword')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <button type="submit" class="btn btn-primary submitButton formRound"
                                                    id="changePasswordBtn">{{ __('UserProfilesettings.Change Password') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>



                        {{-- EDIT CITIZEN --}}
                        <div class="col-md-4">
                            <div class="titleInfo">{{ __('UserProfilesettings.CitizenID') }}</div>
                            <div class="contentInfo mt-1">
                                <div class="showcontent" style="display: none">
                                    <a href="#" class="d-block mb-2" id="showCitizenID"></a>
                                    <div class="edit">
                                        <div class="plusIcon">
                                            <i class="showCitizenModalButton fa-light fa-plus"
                                                data-target="#editCitizenID"> </i>
                                        </div>
                                        <!-- Button trigger edit modal -->
                                        <a href="#" class="showCitizenModalButton TextAddButton ml-3"
                                            data-target="#editCitizenID">{{ __('UserProfilesettings.Edit Citizen ID') }}</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal EDIT CITIZEN -->
                            <div class="modal fade" id="editCitizenID" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('UserProfilesettings.Edit Citizen ID') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span class="XCloseModal" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="saveForm_errList_citizenID"></ul>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" class="idToken" value="{{ csrf_token() }}">
                                                <input type="hidden" name="customer_id" class="customer_id" value="">
                                                <div class="form-group">
                                                    <label>{{ __('UserProfilesettings.CitizenID') }}</label>
                                                    <input type="text" name="citizen_id" id="citizen_id"
                                                        class="form-control formRound" value=""
                                                        placeholder="Enter your Citizen ID here">
                                                    {{-- show error message --}}
                                                    <span class="text-danger">
                                                        @error('citizen_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                                <button type="submit" class="btn btn-primary submitButton formRound"
                                                    id="updateCitizenIDBtn">{{ __('UserProfilesettings.UPDATE') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
