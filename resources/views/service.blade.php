@extends('layouts.app')

@section('content')
<?php //print_r($getallusers); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Service</div>

                <div class="card-body">
                    <table border="1">
                        <tr><td>Name</td><td>Email</td><td>Address</td></tr>
                    <?php foreach ($getallusers as $key => $value) {
                       echo "<tr><td>$value->name</td><td>$value->email</td><td>$value->email</td></tr>";
                   } ?>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection