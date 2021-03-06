@extends('layouts.master1')

@section('title','View and Edit Events')

@section('Contents')
	<center>
	<legend>Events List</legend>
	<table cellpadding="5" cellspacing="0" border="1">
		<th> Event Id</th>
		<th> Event Name </th>
		<th> Event Version </th>
		<th>  Donations </th>
		<th>  Venue </th>

		<th> Ongoing </th>
		<th> Action </th>
		<th> Volunteer List </th>
		
		<tbody>
			@foreach($Events as $Event)
			<tr>

				<td>
					<center>
						{{ $Event->Event_id }}
					</center>
				</td>
				<td>
					<center> 
					@foreach($Event_types as $Event_type)
						@if($Event->Event_type_id == $Event_type->Event_type_id)
							{{ $Event_type->Event_name }}
						@endif
					@endforeach
					</center>
				</td>
				<td> 
					<center>
						{{ $Event->Event_name }}
					</center>
				</td>
				<td>
					<center>
						{{ $Event->Donations }}
					</center>
				</td>
				<td>
					<center>
						{{ $Event->Venue}}
					</center>
				</td>
				<td>
					<center>
					@if ($Event->Ongoing)
						Yes
					@else 
						No 
					@endif
					</center>
				</td>
				
				<td>
				<form action="{{url('/').'/Events/'.$Event->Event_id.'/edit'}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" name="submitLogin" class="btn btn-default" >
						Edit
					</button>
				</form>
				
				</td>
				<td>
					<form action="{{url('/').'/Events/'.$Event->Event_id.'/volunteerList'}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" name="submitLogin" class="btn btn-default" >
							Show Volunteer List
						</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
</center>

@stop