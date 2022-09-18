@push('styles')
    <style>

    </style>
@endpush
<div>
    <div class="my-3 text-center">
        <h4 style="padding-bottom: 20px; padding-top: 20px; font-size:35px;" class="display-5 fw-bold">Quran
            Search Using English Word/Subject</h4>
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
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button wire:click.prevent="tabchnage('tabOne')"
                            class="nav-link  @if ($tabStatus == 'tabOne') active @endif" id="pills-home-tab"
                            type="button">Search by Single English
                            Word/Subject</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:click.prevent="tabchnage('tabTwo')"
                            class="nav-link  @if ($tabStatus == 'tabTwo') active @endif" id="pills-profile-tab"
                            type="button">Search by Multiple English
                            Word/Subject</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:click.prevent="tabchnage('tabThree')"
                            class="nav-link  @if ($tabStatus == 'tabThree') active @endif" id="pills-contact-tab"
                            type="button">Search by Multiple English
                            Word/Subject</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade @if ($tabStatus == 'tabOne') show active @endif">
                        <input type="text" wire:model="searchUsingEnglishWord" id="myInput" onkeyup="myFunction()"
                            placeholder="Enter single word/subject..">
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura-Ayat</th>
                                    <th>English Word Subject Category</th>
                                    <th>Inference Flag</th>
                                    <th>Sura Ayat English Description</th>
                                    <th>Hadith Description</th>
                                </tr>
                                @php
                                    $sl = $search_using_english_word->perPage() * $search_using_english_word->currentPage() - ($search_using_english_word->perPage() - 1);
                                @endphp
                                @if ($search_using_english_word->count() > 0)
                                    @foreach ($search_using_english_word as $ayat_word)
                                        <tr>
                                            <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
                                            <td>{{ $ayat_word->english_word_subject_category }}</td>
                                            <td>{{ $ayat_word->inference_flag }}</td>
                                            <td>{{ suraAyatData($ayat_word->surah_number, $ayat_word->ayat_number)->sura_ayat_english_description }}
                                            </td>
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
                        {{ $search_using_english_word->links('pagination-links-table') }}
                    </div>
                    <div class="tab-pane fade @if ($tabStatus == 'tabTwo') show active @endif">
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <input type="text" wire:model="searchUsingEnglishWordTabTwoOne" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter multiple english word/subject.."><span
                                style="padding-top: 12px;" class="justify-content-center">OR</span>
                            <input type="text" wire:model="searchUsingEnglishWordTabTwoTwo" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter multiple english word/subject.."><span
                                style="padding-top: 12px;" class="justify-content-center">OR</span>
                            <input type="text" wire:model="searchUsingEnglishWordTabTwoThree" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter multiple english word/subject.."><span
                                style="padding-top: 12px;" class="justify-content-center">OR</span>
                            <input type="text" wire:model="searchUsingEnglishWordTabTwoFour" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter multiple english word/subject..">
                        </div>
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura-Ayat</th>
                                    <th>English Word-Subject-Category</th>
                                    <th>Inference Flag</th>
                                    <th>Sura Ayat English Description</th>
                                    <th>Hadith Description</th>
                                </tr>
                                @if ($search_using_english_word_tab_two->count() > 0)
                                    @foreach ($search_using_english_word_tab_two as $ayat_word)
                                        <tr>
                                            <td>{{ $ayat_word->surah_number }}:{{ $ayat_word->ayat_number }}</td>
                                            <td>{{ $ayat_word->english_word_subject_category }}</td>
                                            <td>{{ $ayat_word->inference_flag }}</td>
                                            <td>{{ suraAyatData($ayat_word->surah_number, $ayat_word->ayat_number)->sura_ayat_english_description }}
                                            </td>
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
                        {{ $search_using_english_word_tab_two->links('pagination-links-table') }}
                    </div>
                    <div class="tab-pane fade @if ($tabStatus == 'tabThree') show active @endif">
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <input type="text" wire:model="searchUsingEnglishWordTabThreeOne" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter multiple english word/subject.."><span
                                style="padding-top: 12px;" class="justify-content-center">AND</span>
                            <input type="text" wire:model="searchUsingEnglishWordTabThreeTwo" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter multiple english word/subject.."><span
                                style="padding-top: 12px;" class="justify-content-center">AND</span>
                            <input type="text" wire:model="searchUsingEnglishWordTabThreeThree" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter multiple english word/subject..">
                        </div>
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura Number</th>
                                    <th>Ayat Number</th>
                                    <th>Sura Ayat English Description </th>
                                </tr>
                                @if ($search_using_english_word_tab_three->count() > 0)
                                    @foreach ($search_using_english_word_tab_three as $ayat_word)
                                        <tr>
                                            <td>{{ $ayat_word->surah_number }}</td>
                                            <td>{{ $ayat_word->ayat_number }}</td>
                                            <td>{{ suraAyatData($ayat_word->surah_number, $ayat_word->ayat_number)->sura_ayat_english_description }}
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
                        {{ $search_using_english_word_tab_three->links('pagination-links-table') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
