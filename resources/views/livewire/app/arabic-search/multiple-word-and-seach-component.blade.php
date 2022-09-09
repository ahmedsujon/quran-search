@push('styles')
    <style>

    </style>
@endpush
<div>
    <div class="my-3 text-center">
        <h4 style="padding-bottom: 20px; padding-top: 20px; font-size:35px;" class="display-5 fw-bold">Quran Multiple
            Word (AND)
            Search</h4>
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
                            class="nav-link @if ($tabStatus == 'tabOne') active @endif" id="pills-home-tab"
                            type="button">Search by Arabic Root
                            word</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:click.prevent="tabchnage('tabTwo')"
                            class="nav-link @if ($tabStatus == 'tabTwo') active @endif" id="pills-profile-tab"
                            type="button">Search by Normalize Arabic
                            Word</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button wire:click.prevent="tabchnage('tabThree')"
                            class="nav-link @if ($tabStatus == 'tabThree') active @endif" id="pills-contact-tab"
                            type="button">Search
                            by Actual Arabic Words
                            in Quran</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade @if ($tabStatus == 'tabOne') show active @endif">
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <input dir="rtl" wire:model="multipleOrWordSearchOne" type="text" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter arabic root words"><span
                                style="padding-top: 12px;" class="justify-content-center">AND</span>
                            <input dir="rtl" wire:model="multipleOrWordSearchtwo" type="text" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter arabic root words">
                            <input dir="rtl" wire:model="multipleOrWordSearchthree" type="text" id="myInput"
                                onkeyup="myFunction()" placeholder="Enter arabic root words">
                        </div>
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura Number</th>
                                    <th>Ayat Number</th>
                                    <th>Sura Ayat Arabic Description</th>
                                </tr>
                                @if ($multiple_or_words_search->count() > 0)
                                    @foreach ($multiple_or_words_search as $ayat_word)
                                        <tr>
                                            <td>{{ $ayat_word->surah_number }}</td>
                                            <td>{{ $ayat_word->ayat_number }}</td>
                                            <td>{{ suraAyatData($ayat_word->surah_number, $ayat_word->ayat_number)->sura_ayat_arabic_description }}
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
                        {{ $multiple_or_words_search->links('pagination-links-table') }}
                    </div>
                    <div class="tab-pane fade @if ($tabStatus == 'tabTwo') show active @endif">
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <input dir="rtl" wire:model="multipleOrWordSearchTabTwoOne" type="text"
                                id="myInput" onkeyup="myFunction()" placeholder="Enter nomalize arabic words"><span
                                style="padding-top: 12px;" class="justify-content-center">AND</span>
                            <input dir="rtl" wire:model="multipleOrWordSearchTabTwoTwo" type="text"
                                id="myInput" onkeyup="myFunction()" placeholder="Enter nomalize arabic words"><span
                                style="padding-top: 12px;" class="justify-content-center">AND</span>
                            <input dir="rtl" wire:model="multipleOrWordSearchTabTwoThree" type="text"
                                id="myInput" onkeyup="myFunction()" placeholder="Enter nomalize arabic words">
                        </div>
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura Number</th>
                                    <th>Ayat Number</th>
                                    <th>Sura Ayat Arabic Description</th>
                                </tr>
                                @if ($multiple_or_words_search_tab_two->count() > 0)
                                    @foreach ($multiple_or_words_search_tab_two as $ayat_word)
                                        <tr>
                                            <td>{{ $ayat_word->surah_number }}</td>
                                            <td>{{ $ayat_word->ayat_number }}</td>
                                            <td>{{ suraAyatData($ayat_word->surah_number, $ayat_word->ayat_number)->sura_ayat_arabic_description }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No data available!</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        {{ $multiple_or_words_search_tab_two->links('pagination-links-table') }}
                    </div>
                    <div class="tab-pane fade @if ($tabStatus == 'tabThree') show active @endif">
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <input dir="rtl" wire:model="multipleOrWordSearchTabThreeOne" type="text"
                                id="myInput" onkeyup="myFunction()"
                                placeholder="Enter actual arabic words in quran"><span style="padding-top: 12px;"
                                class="justify-content-center">AND</span>
                            <input dir="rtl" wire:model="multipleOrWordSearchTabThreeTwo" type="text"
                                id="myInput" onkeyup="myFunction()"
                                placeholder="Enter actual arabic words in quran"><span style="padding-top: 12px;"
                                class="justify-content-center">AND</span>
                            <input dir="rtl" wire:model="multipleOrWordSearchTabThreeThree" type="text"
                                id="myInput" onkeyup="myFunction()"
                                placeholder="Enter actual arabic words in quran">
                        </div>
                        <div style="overflow-x:auto;">
                            <table id="myTable">
                                <tr class="header">
                                    <th>Sura Number</th>
                                    <th>Ayat Number</th>
                                    <th>Sura Ayat Arabic Description </th>
                                </tr>
                                @if ($multiple_or_words_search_tab_three->count() > 0)
                                    @foreach ($multiple_or_words_search_tab_three as $ayat_word)
                                        <tr>
                                            <td>{{ $ayat_word->surah_number }}</td>
                                            <td>{{ $ayat_word->ayat_number }}</td>
                                            <td>{{ suraAyatData($ayat_word->surah_number, $ayat_word->ayat_number)->sura_ayat_arabic_description }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No data available!</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        {{ $multiple_or_words_search_tab_three->links('pagination-links-table') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
