@extends('layouts.frontend')

@section('pageTitle', 'Forms - West Point Real Estate')

@section('content')
<div class="container">
    <template>
        <section>
            <b-tabs position="is-centered">
                <b-tab-item label="Contract Packages">
                    <template>
                        <b-field grouped group-multiline>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Contract Packages/SageACQ_OO_IN_SALES_CONTRACT_all_areas1.pdf') }}" target="_blank">OO and Investor Packages</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Contract Packages/SAGE_NON-PROFIT_SALES_CONTRACT_all_areas1.pdf') }}" target="_blank">Non-Profit, NSP and Local Government Packages</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Contract Packages/SageACQ_GNND_SALES_CONTRACT_all_areas.pdf') }}" target="_blank">GNND (Officer/Teacher/Emergency Medical Technician/Firefighter)</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                        </b-field>
                    </template>
                </b-tab-item>

                <b-tab-item label="Amendments">
                    <template>
                        <b-field grouped group-multiline>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Amendments/Amendments-Amendment-to-Sales-Contract.pdf') }}" target="_blank">Sales Contract</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Amendments/Atlanta-Amendments-Add_Remove-Purchaser1.pdf') }}" target="_blank">Add/Remove Purchaser</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Amendments/Atlanta-Amendments-Change_Finance_Type.pdf') }}" target="_blank">Change Finance Type</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Amendments/Atlanta-Amendments-Corrections-to-Buyer’s-Name_-Address_Style_Status1.pdf') }}" target="_blank">Corrections to Buyer’s Name/Address/Style/Status</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                        </b-field>
                    </template>
                </b-tab-item>

                <b-tab-item label="Deeds">
                    <template>
                        <b-field grouped group-multiline>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">doc</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Deeds/FLDeed.doc') }}" target="_blank">Florida Deed</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">doc</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Deeds/GA-Deed.doc') }}" target="_blank">Georgia Deed</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">doc</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Deeds/IN-Deed.doc') }}" target="_blank">Indiana Deed</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">doc</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Deeds/KY-Deed.doc') }}" target="_blank">Kentucky Deed</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">doc</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Deeds/GNND-Deed.doc') }}" target="_blank">GNND Deed</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">doc</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Deeds/GNNDNote.doc') }}" target="_blank">GNND Note</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                        </b-field>
                    </template>
                </b-tab-item>

                <b-tab-item label="Buyer Select">
                    <template>
                        <b-field grouped group-multiline>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Buyer Select/SAMS-1103_Request_to_wire.pdf') }}" target="_blank">Wire Transfer Form (SAMS 1103)</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Buyer Select/Atlanta-POST-Closing-Check-Sheet1.pdf') }}" target="_blank">Post Closing Check Sheet</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="{{ url('/files/Buyer Select/Closing-FAQs-1.pdf') }}" target="_blank">Closing FAQs</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                        </b-field>
                    </template>
                </b-tab-item>

                <b-tab-item label="FSM Utility Activation Request Forms">
                    <p>Provided courtesy of HUD’s Field Services Managers. We do not guarantee accuracy of FSM utility forms and links.</p>
                    <template>
                        <b-field grouped group-multiline>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="https://www.prescientfsm.com/pkform.aspx" target="_blank">4A – PK Management Group</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="http://www.a2zfieldservices.com/utilityactivation.aspx" target="_blank">7A – A2Z</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                            <div class="control">
                                <b-taglist attached>
                                    <b-tag type="is-dark">pdf</b-tag>
                                    <b-tag type="is-info">
                                        <a href="http://www.cwis-llc.com/lenders-bankers-re" target="_blank">8A – CWIS</a>
                                    </b-tag>
                                </b-taglist>
                            </div>
                        </b-field>
                    </template>
                </b-tab-item>

                <b-tab-item label="Other Forms">
                    Nunc nec velit nec libero vestibulum eleifend.
                    Curabitur pulvinar congue luctus.
                    Nullam hendrerit iaculis augue vitae ornare.
                    Maecenas vehicula pulvinar tellus, id sodales felis lobortis eget.
                </b-tab-item>
            </b-tabs>
        </section>
        <b-notification type="is-success" :closable="false" has-icon>
            To view, complete, and print fillable forms you will need to use Adobe Acrobat Reader, Standard, or Pro 9.0 (or later) for PDF files OR Microsoft Office for DOC files. Adobe Acrobat Reader is available for free and can be downloaded from the following web site: <a href="http://get.adobe.com/reader/" target="_blank">Adobe Reader</a>. Browsers like Google Chrome and Firefox use built-in PDF viewers that are not supported for use with the fillable forms.
        </b-notification>
    </template>
</div>
@endsection
