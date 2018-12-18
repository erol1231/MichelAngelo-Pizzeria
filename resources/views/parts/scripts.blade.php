 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="{{asset('js/jquery-1.10.2.min.js')}}"/>')</script>
   <script type="text/javascript" src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>   
   <script src="{{asset('js/jquery.flexslider.js')}}"></script>
   <script src="{{asset('js/jquery.fittext.js')}}"></script>
   <script src="{{asset('js/backstretch.js')}}"></script> 
   <script src="{{asset('js/waypoints.js')}}"></script>  
   <script src="{{asset('js/main.js')}}"></script>

<script>
  
    $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

  $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

  </script>