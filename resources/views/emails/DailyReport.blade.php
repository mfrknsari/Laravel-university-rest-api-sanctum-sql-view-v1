@component('mail::message')
# Daily Report
@php
$schools = DB::table('schools')->where('created_at', '>', now()->subDay(1))->get();
$count = $schools->count();

@endphp
New School Registrations
<table border="1" width="100%">
    <thead>
    <td>Order</td>
    <td>Name</td>
    <td>Created Date</td>
    </thead>
    @php
    if ($count>0):
    @endphp
          @foreach($schools as $value)
          <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->name}}</td>
               <td>{{$value->created_at}}</td>
          </tr>
          @endforeach
    @php
        else:
            echo 'No records created in the last 24 hours';
        endif
    @endphp
</table>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
