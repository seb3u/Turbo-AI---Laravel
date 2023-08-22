@extends('backend.layout.content')
@section('title', __('Clients'))

@section('content')
  <div class="mb-2 d-flex justify-content-between">
    <div class="card-title m-0">
      <h5 class="mb-0 mt-2">
        {{__('Usecases')}}
      </h5>
    </div>
    <div class="d-flex align-items-center">
      <a href="{{route('dashboard.admin.frontend.partners.createEdit')}}"
         class="btn btn-primary me-2">{{__('Add new')}}</a>
    </div>
  </div>
  <div class="card">
    <div class="card-body p-2 pb-3">
      <div class="table-responsive text-wrap">
        <table class="table">
          <thead>
          <tr>
            <th>{{__('Image')}}</th>
            <th>{{__('Name')}}</th>
            <th>{{__('Created At')}}</th>
            <th>{{__('Actions')}}</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach($partners as $partner)
            <tr>
              <td>
                <div class="d-flex rounded-3 align-items-center justify-content-center overflow-hidden">
                  <img class="rounded-3 overflow-hidden" src="{{asset($partner->image)}}" width="40px;"
                       alt="{{$partner->name}}">
                </div>
              </td>
              <td>{{$partner->name}}</td>
              <td>
                {{date('j F, Y h:i:s A', strtotime($partner->created_at))}}
              </td>
              <td>
                <div class="d-flex">
                  <a
                    href="{{route('dashboard.admin.frontend.partners.createEdit', $partner->id)}}"
                    class="d-flex btn-icon rounded-2 me-2 bg-label-primary"
                    title="{{__('Edit')}}">
                    {!! get_svg_icon('pen-alt-2', 'fs-4', '', '', ['height' => '22' , 'width' => '22'])!!}
                  </a>
                  <a data-toast-type="error"
                     data-toast-confirm="true"
                     data-toast-msg="{{__('This will be deleted, This action can be reverted.')}}"
                     data-toast-link="{{route('dashboard.admin.frontend.partners.delete', $partner->id)}}"
                     class="confirm-toast d-flex btn-icon rounded-2 me-2 bg-label-danger cursor-pointer"
                     data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                     title="{{__('Delete')}}">
                    {!! get_svg_icon('trash-bin-minimalistic', 'fs-4', '', '', ['height' => '22' , 'width' => '22'])!!}
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
