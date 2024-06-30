<div class="row blog-grid">
    @forelse ($bulan as $item)
    <div class="col-md-6">
        <div class="course-box">
            <div class="image-wrap entry">
                <img src="{{ asset('assets/images/beritas/'.$item->image) }}" alt="gambar berita" class="imageberita">
            </div><!-- end image-wrap -->
            <div class="course-details">
                <h4 style="height: 55px; overflow: hidden; text-overflow: ellipsis;">
                    <a href="{{ route('landingdetailberita', $item->id) }}" title="">{{ $item->title }}</a>
                </h4>
                <h5 style="height: 80px; overflow: hidden; text-overflow: ellipsis;">{!! $item->description !!}</h5>
            </div><!-- end details -->
            <div class="course-footer clearfix">
                <div class="pull-left">
                    <ul class="list-inline">
                        <li><span style="padding: 5px; background-color: green; color: white; font-size: 12px;">{{ $item->category }}</span></li>
                        <li><a href="#"><i class="fa fa-clock-o"></i>{{ $item->created_at->diffForHumans() }}</a></li>
                    </ul>
                </div><!-- end left -->
            </div><!-- end footer -->
        </div><!-- end box -->
    </div><!-- end col -->
    @empty
    <div class="col-md-12">
        <h3 class="text-center">berita kosong !</h3>
    </div>
    @endforelse
</div>
<div class="row">
    <div class="col-md-12">
        {{ $bulan->links() }}
    </div><!-- end col -->
</div><!-- end row -->
<script>
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        month(page);
    });
</script>