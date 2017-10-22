@extends('layouts.backend')

@section('pageTitle', 'Administration - Properties')

@section('content')
<section>
    <b-field grouped group-multiline>
        <b-select v-model="tablePerPage">
            <option value="10">10 per page</option>
            <option value="25">25 per page</option>
            <option value="50">50 per page</option>
            <option value="100">100 per page</option>
        </b-select>
        <div class="control is-flex">
            <b-switch v-model="displayArchived" type="is-success">Display Archived</b-switch>
        </div>
    </b-field>
    <b-table
        :data="{!! htmlspecialchars($properties->toJson(), ENT_QUOTES, 'UTF-8') !!}"
        detailed
        :paginated="true"
        :per-page="tablePerPage"
        :pagination-simple="false"
        :default-sort-direction="tableSortDirection"
        default-sort="created_at"
        :mobile-cards="true"
        icon-pack="fa"
        :row-class="(row, index) => row.active === 0 ? displayArchived ? '' : 'is-hidden' : ''">

        <template scope="props">
            <b-table-column field="status.name" label="Status" sortable>
                @{{ props.row.status.name }}
            </b-table-column>

            <b-table-column field="address" label="Title" sortable>
                @{{ props.row.title }}
            </b-table-column>

            <b-table-column field="address" label="Address" sortable>
                @{{ props.row.address }}
            </b-table-column>

            <b-table-column field="created_at" label="Creation Date" sortable centered>
                @{{ toDate(props.row.created_at) }}
            </b-table-column>
        </template>

        <template slot="detail" scope="props">
            <article class="media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img :src="props.row.mainImage" alt="House image">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>Property type: </strong>
                            <small>@{{ props.row.type.name }}</small>
                            <br>
                            <div v-html="props.row.description"></div>
                        </p>
                        <b-field grouped group-multiline>
                            <div class="control is-flex">
                                <b-switch
                                v-on:input="updateProperty($event, props.row.id, 'favorite')"
                                :value="props.row.favorite"
                                true-value="1"
                                false-value="0"
                                type="is-success">
                                    Favorite
                                </b-switch>
                            </div>
                            <div class="control is-flex">
                                <b-switch
                                v-on:input="updateProperty($event, props.row.id, 'active')"
                                :value="props.row.active"
                                true-value="0"
                                false-value="1"
                                type="is-success">
                                    Archive
                                </b-switch>
                            </div>
                            <p class="control">
                                <a class="button is-primary" :href="'/admin/property/' + props.row.id + '/edit'" target="_blank">
                                    Edit
                                </a>
                            </p>
                        </b-field>
                    </div>
                </div>
            </article>
        </template>

        <template slot="empty">
            <section class="section">
                <div class="content has-text-grey has-text-centered">
                    <p>
                        <b-icon
                            icon="frown-o"
                            size="is-large">
                        </b-icon>
                    </p>
                    <p>No properties</p>
                </div>
            </section>
        </template>
    </b-table>
</section>
@endsection
