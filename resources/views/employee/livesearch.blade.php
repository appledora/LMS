<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booklist</title><!-- Icon css link -->
    <link href="css/font-awesome.min.css" rel="stylesheet"><!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- Rev slider css -->
    <link href="vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="vendors/revolution/css/navigation.css" rel="stylesheet"><!-- Extra plugin css -->
    <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]--></head>
@if(!empty($books))
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-primary">
            <th>ISBN_code</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Quantity</th>

            <th><a href="" class="bg-primary">Edit</a></th>

            </thead>
            <tbody>@if(count($books) > 0) @foreach($books->all() as $book)
                <tr>
                    <td>{{$book->ISBN_code}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->category}}</td>
                    <td>{{$book->noOfCopies}}</td>
                    <td><a href='{{url("/updateBook/{$book->ISBN_code}")}}'
                           class="btn btn-sm btn-warning">Update</a> &nbsp;<a
                                href='{{url("/deleteBook/{$book->ISBN_code}")}}'
                                class="btn btn-sm btn-danger">Delete</a></td>
                </tr> @endforeach @endif</tbody>

        </table>
    </div>
@else
    {{"no data found"}}
@endif