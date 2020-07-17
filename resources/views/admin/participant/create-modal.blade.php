@push('style')
    <style>
        .modal {
            padding: 0 !important; // override inline padding-right added from js
        }
        .modal .modal-dialog {
            width: 100%;
            max-width: none;
            height: 100%;
            margin: 0;
        }
        .modal .modal-content {
            height: auto;
            border: 0;
            border-radius: 0;
        }
        .modal .modal-body {
            overflow-y: auto;
        }
    </style>
@endpush
<div class="modal fade" id="NewParticipantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="questions-block">
                <form action="" method="post" id="refForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> নতুন পরীক্ষার্থী যোগ করুন</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="participants">
                            <table class="table  table-bordered  table-hover">
                                <thead>
                                <tr>
                                    <th> নাম</th>
                                    <th width="18%"> মোবাইল নং</th>
                                    <th width="18%"> ইমেইল</th>
                                    <th width="18%"> পাসওয়ার্ড</th>
                                    <th width="1%">#</th>
                                </tr>
                                </thead>
                                <tbody class="participant-group">

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> বাদ দিন</button>
                        <button type="submit" class="btn btn-primary"> যুক্ত করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
