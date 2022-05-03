<meta name="csrf-token" content="{{ csrf_token() }}" />
<h2>Lấy Token</h2>

<a href="" class="js-get-drive">Click get Drive</a>


<script>
    var URL_GET_DEVICE = '{{ route("post.noty.device_token") }}';
</script>
<script src="{{ asset('js/init_admin.js') }}"></script>
