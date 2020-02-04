<footer>
    <p>저는 푸터 영역입니다.</p>
</footer>

@section('script')
    @parent {{-- 섹션 상속의 해결 --}}
    <script>
        alert("저는 조각 뷰의 'script' 섹션입니다.")
    </script>
@endsection