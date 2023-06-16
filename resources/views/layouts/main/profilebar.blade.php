<nav class="bp-navs bp-subnavs no-ajax user-subnav bb-subnav-plain" id="subnav" role="navigation" aria-label="Sub Menu">
                                                                <ul class="subnav">



                                                                    <li id="edit-personal-li" class="bp-personal-sub-tab @if($select==0) current selected @endif" data-bp-user-scope="edit">
                                                                        <a href="{{route('charging')}}" class="">
                                                                            شحن بطاقة
                                                                        </a>

                                                                    </li>


                                                                    <li id="change-avatar-personal-li" class="bp-personal-sub-tab @if($select==1) current selected @endif" data-bp-user-scope="change-avatar">
                                                                        <a href="{{route('profile')}}" id="change-avatar" class="">
                                                                            تعديل الحساب
                                                                        </a>

                                                                    </li>

                                                                    <li id="change-avatar-personal-li" class="bp-personal-sub-tab @if($select==2) current selected @endif" data-bp-user-scope="change-password">
                                                                        <a href="{{route('profile.password')}}" id="change-avatar" class="">
                                                                            تغيير كلمة المرور 
                                                                        </a>

                                                                    </li>


                                                                    <li id="change-cover-image-personal-li" class="bp-personal-sub-tab @if($select==3) current selected @endif" data-bp-user-scope="change-cover-image">
                                                                        <a href="{{route('profile.image')}}" id="change-cover-image" class="">
                                                                            صورة الحساب
                                                                        </a>

                                                                    </li>


                                                                </ul>
                                                            </nav><!-- .item-list-tabs#subnav -->