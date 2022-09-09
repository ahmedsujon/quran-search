<div>
    <div class="my-3 text-center">
      <h4 style="padding-bottom: 20px; padding-top: 20px; font-size:35px;" class="display-5 fw-bold">Quran Multiple
        Word (Either, OR)
        Search</h4>
      <a href="{{ route('website') }}" type="button" class="btn btn-primary">
        Home
      </a>
      <a href="{{ route('database.search') }}" type="button" class="btn btn-primary">
        Search List
      </a>
    </div>
  
    <div style="padding-left: 20px; padding-right: 20px;" class="row">
      <div style="padding-left: 20px;" class="card">
        <div class="card-body">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button wire:click.prevent="tabchnage('tabOne')" class="nav-link @if ($tabStatus == 'tabOne') active @endif"
                id="pills-home-tab" type="button">Search by Arabic Root
                word</button>
            </li>
            <li class="nav-item" role="presentation">
              <button wire:click.prevent="tabchnage('tabTwo')" class="nav-link @if ($tabStatus == 'tabTwo') active @endif"
                id="pills-profile-tab" type="button">Search by Normalize Arabic
                Word</button>
            </li>
            <li class="nav-item" role="presentation">
              <button wire:click.prevent="tabchnage('tabThree')"
                class="nav-link @if ($tabStatus == 'tabThree') active @endif" id="pills-contact-tab" type="button">Search
                by Actual Arabic Words
                in Quran</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade @if ($tabStatus == 'tabOne') show active @endif">
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <input dir="rtl" wire:model="multipleWordSearch" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter arabic root words"><span style="padding-top: 12px;"
                  class="justify-content-center">OR</span>
                <input dir="rtl" wire:model="multipleWordSearchTwo" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter arabic root words"><span style="padding-top: 12px;"
                  class="justify-content-center">OR</span>
                <input dir="rtl" wire:model="multipleWordSearchThree" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter arabic root words">
              </div>
              <div style="overflow-x:auto;">
                <table id="myTable">
                  <tr class="header">
                    <th>Surah-Ayat</th>
                    <th>Arabic Root Word</th>
                    <th>Normalize Arabic Word</th>
                    <th>Inference Flag</th>
                    <th>Sura Ayat Arabic Description</th>
                    <th>Hadith Description</th>
                  </tr>
                  @foreach ($multiple_words_search as $multipleword)
                  <tr>
                    <td>{{ $multipleword->surah_no }}:{{ $multipleword->ayat_no }}</td>
                    <td>{{ $multipleword->arabic_root_word }}</td>
                    <td>{{ $multipleword->normalize_word }}</td>
                    <td>{{ $multipleword->inference_flag }}</td>
                    <td>{{ suraAyatData($multipleword->surah_no, $multipleword->ayat_no)->ayat_arabic_description }}
                    </td>
                    <td>
                      @if (isset($multipleword->hadithData->hadith_description))
                      {{ $multipleword->hadithData->hadith_description }}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
              {{ $multiple_words_search->links('pagination-links-table') }}
            </div>
  
            <div class="tab-pane fade @if ($tabStatus == 'tabTwo') show active @endif">
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <input dir="rtl" wire:model="multipleWordSearchTabTwoOne" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter nomalize arabic words"><span style="padding-top: 12px;"
                  class="justify-content-center">OR</span>
                <input dir="rtl" wire:model="multipleWordSearchTabTwoTwo" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter nomalize arabic words"><span style="padding-top: 12px;"
                  class="justify-content-center">OR</span>
                <input dir="rtl" wire:model="multipleWordSearchTabTwoThree" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter nomalize arabic words">
              </div>
              <div style="overflow-x:auto;">
                <table id="myTable">
                  <tr class="header">
                    <th>Surah-Ayat</th>
                    <th>Normalize Arabic Word</th>
                    <th>Arabic Root Word</th>
                    <th>Inference Flag</th>
                    <th>Sura Ayat Arabic Description </th>
                    <th>Hadith Description</th>
                  </tr>
                  @php
                  $sl = ($multiple_words_search_tab_two->perPage() *
                  $multiple_words_search_tab_two->currentPage())-($multiple_words_search_tab_two->perPage() - 1)
                  @endphp
                  @if ($multiple_words_search_tab_two->count() > 0)
                  @foreach ($multiple_words_search_tab_two as $ayat_word)
                  <tr>
                    <td>{{ $ayat_word->surah_no }}:{{ $ayat_word->ayat_no }}</td>
                    <td>{{ $ayat_word->normalize_word }}</td>
                    <td>{{ $ayat_word->arabic_root_word }}</td>
                    <td>{{ $ayat_word->inference_flag }}</td>
                    <td>{{ suraAyatData($ayat_word->surah_no, $ayat_word->ayat_no)->ayat_arabic_description }}</td>
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
              {{ $multiple_words_search_tab_two->links('pagination-links-table') }}
            </div>
            <div class="tab-pane fade @if ($tabStatus == 'tabThree') show active @endif">
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <input dir="rtl" wire:model="multipleWordSearchTabThreeOne" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter actual arabic words in quran"><span style="padding-top: 12px;"
                  class="justify-content-center">OR</span>
                <input dir="rtl" wire:model="multipleWordSearchTabThreeTwo" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter actual arabic words in quran"><span style="padding-top: 12px;"
                  class="justify-content-center">OR</span>
                <input dir="rtl" wire:model="multipleWordSearchTabThreeThree" type="text" id="myInput" onkeyup="myFunction()"
                  placeholder="Enter actual arabic words in quran">
              </div>
              <div style="overflow-x:auto;">
                <table id="myTable">
                  <tr class="header">
                    <th>Sura Number</th>
                    <th>Ayat Number in Surah</th>
                    <th>Sura Ayat Arabic Description</th>
                  </tr>
                  @if ($multiple_words_search_tab_three->count() > 0)
                  @foreach ($multiple_words_search_tab_three as $ayat_word)
                  <tr>
                    <td>{{ $ayat_word->surah_number }}</td>
                    <td>{{ $ayat_word->ayat_number }}</td>
                    <td>{{ $ayat_word->ayat_arabic_description }}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="5" style="text-align: center;">No data available!</td>
                  </tr>
                  @endif
                </table>
              </div>
              {{ $multiple_words_search_tab_three->links('pagination-links-table') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>