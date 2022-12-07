<div>
    <div class="px-4 py-5 text-center">
        <h1 style="padding-bottom: 30px;" class="display-5 fw-bold">Quran Database Search in Arabic</h1>
        <div style="padding-bottom: 18px;" class="col-lg-6 mx-auto">
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a style="padding: 18px; font-size:16px; font-size:16px;" href="{{ route('single-word-search') }}"
                    class="btn btn-primary">Quran Single
                    Word
                    Search</a>
                <a style="padding: 18px; font-size:16px;" href="{{ route('multiple-word-or-search') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Quran Multiple
                    Word (Either, OR)
                    Search</a>
                <a style="padding: 18px; font-size:16px;" href="{{ route('multiple-word-and-search') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Quran Multiple
                    word (AND)
                    Search</a>
            </div>
        </div>
        <div style="padding-bottom: 40px;" class="col-lg-6 mx-auto">
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a style="padding: 18px; font-size:16px;" href="{{ route('display-quran-arabic') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Display Quran
                    In Arabic</a>
                    <a style="padding: 18px; font-size:16px;" href="{{ route('arabic-dropdown-search') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Select Value Of Arabic
                    Search</a>
            </div>
        </div>
        <h1 style="padding-bottom: 30px; padding-top: 50px;" class="display-5 fw-bold">Quran Database Search in English
        </h1>

        <div style="padding-bottom: 18px;" class="col-lg-6 mx-auto">
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a style="padding: 18px; font-size:16px;" href="{{ route('quran-word-transliteration') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Quran
                    Search Using Transliteration</a>
                <a style="padding: 18px; font-size:16px;" href="{{ route('english-word-search') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Quran
                    Search Using English Word/Subject
                </a>
                <a style="padding: 18px; font-size:16px;" href="{{ route('display-subject-category-word') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Display
                    Complete Quran Sorted By English Word/Subject</a>
            </div>
        </div>
        <div style="padding-bottom: 30px;" class="col-lg-6 mx-auto">
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a style="padding: 18px; font-size:16px;" href="{{ route('display-subsubject-category-word') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Display
                    Complete Quran Sorted By English Sub-Category</a>
                    <a style="padding: 18px; font-size:16px;" href="{{ route('subject-dropdown-search') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Select Value of Subject Category</a>
                <a style="padding: 18px; font-size:16px;" href="{{ route('dropdown-search') }}"
                    class="btn btn-primary btn-lg px-4 gap-3">Select Value of Sub-subject Sub-category</a>
            </div>
        </div>

    </div>
</div>