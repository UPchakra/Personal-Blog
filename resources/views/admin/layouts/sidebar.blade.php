<aside id="leftsidebar" class="sidebar"> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="profile.html"><img src="{{asset('public/adminAssets/assets/images/profile_av.jpg')}}" alt="User"></a></div>
                    <div class="detail">
                        <h4>{{Auth::user()->name}}</h4>
                        <small>UI UX Designer</small>                        
                    </div>
                    <a href="events.html" title="Events"><i class="zmdi zmdi-calendar"></i></a>
                    <a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="contact.html" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>
                    <a href="chat.html" title="Chat App"><i class="zmdi zmdi-comments"></i></a>
                    <a href="sign-in.html" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>
            <li class="header">MAIN NAVIGATION</li>                
            <li class="active open"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-blogger"></i><span> Dashboard</span> </a> </li>
            <li> <a href="{{route('addtag')}}"><i class="zmdi zmdi-plus-circle"></i><span>Tag</span> </a> </li>
            <li><a href="{{route('addcat')}}"><i class="zmdi zmdi-sort-amount-desc"></i><span>category</span> </a> </li>
            <li><a href="{{route('viewpost')}}"><i class="zmdi zmdi-grid"></i><span>Post</span> </a> </li>
            <li><a href="{{route('pending')}}"><i class="zmdi zmdi-grid"></i><span>Pending Post</span> </a> </li>

            <li><a href="{{route('viewsubscriber')}}"><i class="zmdi zmdi-label-alt"></i><span>Subscriber</span> </a> </li>    
            <li><a href="{{route('viewauthor')}}"><i class="zmdi zmdi-label-alt"></i><span>Author   </span> </a> </li>
            <li><a href="{{route('viewfav')}}"><i class="material-icons">favorite</i><span>Favorite Post   </span> </a> </li>               

            
            <li class="header">Settings</li>
            <li><a href="{{route('profile')}}" class="waves-effect waves-block"><i class="zmdi zmdi-plus-circle "></i><span>Profile</span></a></li>
            <li><a href="{{route('viewcomment')}}" class="waves-effect waves-block"><i class="zmdi zmdi-label col-green"></i><span>Comments</span></a></li>
           
        </ul>
    </div>
    <!-- #Menu --> 
</aside>