@push('styles')
<style>

</style>
@endpush
<div>
    <div class="my-3 text-center">
        <h4 style="padding-bottom: 20px; padding-top: 20px; font-size:35px;" class="display-5 fw-bold">Select Value of Arabic Search</h4>
        <a href="{{ route('website') }}" type="button" class="btn btn-primary">
            Home
        </a>
        <a href="{{ route('search-list') }}" type="button" class="btn btn-primary">
            Search List
        </a>
    </div>

    <div style="padding-left: 20px; padding-right: 20px;" class="row">
        <div style="padding-left: 20px;" class="card">
            <div class="card-body">
                <div style="text-align: center; padding-bottom: 50px; margin-left: 20%; margin-right: 20%;"
                    class="dropdown">
                    <select wire:model="dropdownsearch" class="form-select" aria-label="Default select example">
                        <option value="">Select Value For Search</option>
                        @foreach ($dropdown_values as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="overflow-x:auto;">
                    <table id="myTable">
                        <tr class="header">
                            <th>Sura-Ayat</th>
                            <th>Normalized Arabic Word</th>
                            <th>English Word-Subject-Category</th>
                            <th>Inference Flag</th>
                            <th>Sura Ayat Arabic Description</th>
                        </tr>
                        @php
                        $sl = ($search_dropdowns->perPage() *
                        $search_dropdowns->currentPage())-($search_dropdowns->perPage() - 1)
                        @endphp
                        @if ($search_dropdowns->count() > 0)
                        @foreach ($search_dropdowns as $ayat_word)
                        <tr>
                            <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
                            <td>{{ $ayat_word->normalized_arabic_word }}</td>
                            <td>{{ $ayat_word->english_word_subject_category }}</td>
                            <td>{{ $ayat_word->inference_flag }}</td>
                            <td>{{
                                suraAyatData($ayat_word->surah_number,$ayat_word->ayat_number)->sura_ayat_arabic_description
                                }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" style="text-align: center;">No data available!</td>
                        </tr>
                        @endif
                    </table>
                </div>
                {{ $search_dropdowns->links('pagination-links-table') }}
            </div>
        </div>
    </div>
</div>