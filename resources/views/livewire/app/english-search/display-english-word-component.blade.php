@push('styles')
<style>

</style>
@endpush
<div>
  <div class="my-3 text-center">
    <h4 style="padding-bottom: 20px; padding-top: 20px; font-size:35px;" class="display-5 fw-bold">Display
      Complete Quran Sorted By English Word/Subject</h4>
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
        <div style="overflow-x:auto;">
          <table id="myTable">
            <tr class="header">
              <th>Sura-Ayat</th>
              <th>English-Word-Subject-Category,</th>
              <th>English-Word-Subsubject-Subcategory</th>
              <th>Sura Ayat English Description</th>
              <th>Hadith Description</th>
            </tr>
            @if ($display_complete_quran_word->count() > 0)
            @foreach ($display_complete_quran_word as $ayat_word)
            <tr>
              <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
              <td>{{ $ayat_word->english_word_subject_category }}</td>
              <td>{{ $ayat_word->english_word_sub_subject_category }}</td>
              <td>{{ suraAyatData($ayat_word->surah_number,$ayat_word->ayat_number)->sura_ayat_english_description }}</td>
              <td>
                @if (isset($ayat_word->hadithData->hadith_reference))
                {{ $ayat_word->hadithData->hadith_reference }}
                @endif
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="5" style="text-align: center;">No data available!</td>
            </tr>
            @endif
          </table>
        </div>
        {{ $display_complete_quran_word->links('pagination-links-table') }}
      </div>
    </div>
  </div>
</div>