@extends('layouts.app')

@section('content')

<div class="container">

<h2>
    Pending Appeals
</h2>


<table class="table table-bordered">

<thead>

<tr>

<th>Case Number</th>
<th>Client</th>
<th>Lawyer</th>
<th>Appeal Court</th>
<th>Appeal Date</th>

</tr>

</thead>


<tbody>

@forelse($cases as $case)

<tr>

<td>
{{ $case->case_number }}
</td>


<td>
{{ $case->client->name }}
</td>


<td>
{{ $case->lawyer->name }}
</td>


<td>
{{ $case->appeal_court }}
</td>


<td>
{{ $case->appeal_date }}
</td>


</tr>

@empty

<tr>

<td colspan="5">
No appeals found.
</td>

</tr>

@endforelse


</tbody>

</table>


</div>

@endsection