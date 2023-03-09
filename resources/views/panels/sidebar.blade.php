@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{($configData['theme'] === 'dark') ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="col-md-12">
    <a href="{{url('/admin')}}" style="
    margin-top: 20px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-bottom: 10px;
">
      <img style="width: 70px;" src="{{asset('images/logo/logo.png')}}" > 
      <h4 class="brand-text ml-2 mt-2"> CRM</h4>
    </a>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      {{-- Foreach menu item starts --}}
      @if(isset($menuData[0]))
      @foreach($menuData[0]->menu as $menu)
      @if(isset($menu->navheader))
      <li class="navigation-header">
        <span>{{ $menu->navheader }}</span>
        <i data-feather="more-horizontal"></i>
      </li>
      @else
      {{-- Add Custom Class with nav-item --}}
      @php
      $custom_classes = "";
      if(isset($menu->classlist)) {
      $custom_classes = $menu->classlist;
      }
      @endphp
     
      {{--@if(!isset($menu->acl) || Auth::user()->canany(explode(",",$menu->acl))) --}}
      <li class="nav-item {{ Helper::activeMenuBySlug( $menu->slug) ? 'active' : '' }} {{ $custom_classes }}">
        <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}" class="d-flex align-items-center" target="{{isset($menu->newTab) ? '_blank':'_self'}}">
          <i data-feather="{{ $menu->icon }}"></i>
          <span class="menu-title text-truncate">{{ $menu->name }}</span>
          @if (isset($menu->badge))
          <?php $badgeClasses = "badge badge-pill badge-light-primary ml-auto mr-1" ?>
          <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }} ">{{$menu->badge}}</span>
          @endif
        </a>
        
        @if(isset($menu->submenu))
        @include('panels/submenu', ['menu' => $menu->submenu])
        @endif
      </li>
      {{--@endif--}}
      @endif
      @endforeach
     @endif
      {{-- Foreach menu item ends --}}
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
