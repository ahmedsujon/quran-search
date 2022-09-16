@push('styles')
<style>

</style>
@endpush
<div>
  <div class="my-3 text-center">
    <h4 class="display-5 fw-bold">Quran Single
      Word
      Search</h4>
    <a href="{{ route('website') }}" type="button" class="btn btn-primary">
      Home
    </a>
    <a href="{{ route('search-list') }}" type="button" class="btn btn-primary">
      Search List
    </a>
  </div>

  <div style="padding-left: 20px; padding-right: 20px;" class="row">
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button wire:click.prevent="tabchnage('tabOne')" class="nav-link @if($tabStatus == 'tabOne') active @endif" id="pills-home-tab"
              type="button">Search by Arabic Root
              word</button>
          </li>
          <li class="nav-item" role="presentation">
            <button wire:click.prevent="tabchnage('tabTwo')" class="nav-link @if($tabStatus == 'tabTwo') active @endif" id="pills-profile-tab"
              type="button">Search by Normalize Arabic
              Word</button>
          </li>
          <li class="nav-item" role="presentation">
            <button wire:click.prevent="tabchnage('tabThree')" class="nav-link @if($tabStatus == 'tabThree') active @endif" id="pills-contact-tab"
              type="button" >Search by Actual Arabic Words
              in Quran</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade @if($tabStatus == 'tabOne') show active @endif">
            <input dir="rtl" wire:model="singleArabicRootWord" type="text" id="myInput" onkeyup="myFunction()"
              placeholder="Enter arabic root word">
            <div style="overflow-x:auto;">
              <table id="myTable">
                <tr class="header">
                  <th>Surah-Ayat</th>
                  <th>Arabic Root Word</th>
                  <th>Normalize Arabic Word</th>
                  <th>English Word-Subject-Category</th>
                  <th>Inference Flag</th>
                  <th>Sura Ayat Arabic Description </th>
                  <th>Hadith Description</th>
                </tr>
                @php
                $sl = ($ayat_words->perPage() * $ayat_words->currentPage())-($ayat_words->perPage() - 1)
                @endphp
                @if ($ayat_words->count() > 0)
                @foreach ($ayat_words as $ayat_word)
                <tr>
                  <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
                  <td>{{ $ayat_word->arabic_root_word }}</td>
                  <td>{{ $ayat_word->normalized_arabic_word }}</td>
                  <td>{{ $ayat_word->english_word_subject_category }}</td>
                  <td>{{ $ayat_word->inference_flag }}</td>
                  <td>{{ suraAyatData($ayat_word->surah_number,$ayat_word->ayat_number)->sura_ayat_arabic_description }}</td>
                  <td>
                    @if (isset($ayat_word->hadithData->hadith_description))
                    {{ $ayat_word->hadithData->hadith_description }}
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
            {{ $ayat_words->links('pagination-links-table') }}
          </div>
          <div class="tab-pane fade @if($tabStatus == 'tabTwo') show active @endif">
            <input dir="rtl" wire:model="singleArabicRootWordSecenttab" type="text" id="myInput" onkeyup="myFunction()"
              placeholder="Enter normailzed arabic words">
            <div style="overflow-x:auto;">
              <table id="myTable">
                <tr class="header">
                  <th>Surah-Ayat</th>
                  <th>Normalize Arabic Word</th>
                  <th>Arabic Root Word</th>
                  <th>English Word Subject Category</th>
                  <th>Inference Flag</th>
                  <th>Sura Ayat Arabic Description</th>
                  <th>Hadith Description</th>
                </tr>
                @php
                $sl = ($ayat_wordstabtwo->perPage() * $ayat_wordstabtwo->currentPage())-($ayat_wordstabtwo->perPage() - 1)
                @endphp
                @if ($ayat_wordstabtwo->count() > 0)
                @foreach ($ayat_wordstabtwo as $ayat_word)
                <tr>
                  <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
                  <td>{{ $ayat_word->normalized_arabic_word }}</td>
                  <td>{{ $ayat_word->arabic_root_word }}</td>
                  <td>{{ $ayat_word->english_word_subject_category }}</td>
                  <td>{{ $ayat_word->inference_flag }}</td>
                  <td dir="rtl">{{ suraAyatData($ayat_word->surah_number,$ayat_word->ayat_number)->sura_ayat_arabic_description }}</td>
                  <td>
                    @if (isset($ayat_word->hadithData->hadith_description))
                    {{ $ayat_word->hadithData->hadith_description }}
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
            {{ $ayat_wordstabtwo->links('pagination-links-table') }}
          </div>
          <div class="tab-pane fade @if($tabStatus == 'tabThree') show active @endif">
            <input dir="rtl" wire:model="singleArabicRootWordSecenttabThree" type="text" id="myInput" onkeyup="myFunction()"
              placeholder="Enter actual arabic words in quran">
            <div style="overflow-x:auto;">
              <table id="myTable">
                <tr class="header">
                  <th>Surah Number Key</th>
                  <th>Ayat Number in Surah</th>
                  <th>Sura Ayat Arabic Description</th>
                </tr>
                @php
                $sl = ($ayat_wordstabthree->perPage() * $ayat_wordstabthree->currentPage())-($ayat_wordstabthree->perPage() - 1)
                @endphp
                @if ($ayat_wordstabthree->count() > 0)
                @foreach ($ayat_wordstabthree as $ayat_word)
                <tr>
                  <td>{{ $ayat_word->surah_number }}</td>
                  <td>{{ $ayat_word->ayat_number }}</td>
                  <td dir="rtl">{{ $ayat_word->sura_ayat_arabic_description }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="5" style="text-align: center;">No data available!</td>
                </tr>
                @endif
              </table>
            </div>
            {{ $ayat_wordstabthree->links('pagination-links-table') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>