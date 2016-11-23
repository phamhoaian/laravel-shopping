<div class="container">
    <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu">
                <li><a class="active" href="{{ url('/') }}">Home</a>
                </li>
                <?php
                    $parent_cate = DB::table('cates')->where('parent_id', 0)->get();
                ?>
                @foreach($parent_cate as $parent)
                <li>
                    <a href="{{ route('category', [$parent->id, $parent->alias]) }}">{!! $parent->name !!}</a>
                    <?php
                        $child_cate = DB::table('cates')->where('parent_id', $parent->id)->get();
                    ?>
                    @if ($child_cate)
                        <div>
                            <ul>
                                @foreach($child_cate as $child)
                                <li>
                                    <a href="{{ route('category', [$child->id, $child->alias]) }}">{!! $child->name !!}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
                @endforeach
                <li><a href="myaccount.html">My Account</a>
                    <div>
                        <ul>
                            <li><a href="myaccount.html">My Account</a>
                            </li>
                            <li><a href="login.html">Login</a>
                            </li>
                            <li><a href="register.html">Register</a>
                            </li>
                            <li><a href="wishlist.html">Wishlist</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
