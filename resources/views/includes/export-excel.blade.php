<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalExport">
    تصدير ملف Excel
</button>
<!-- Modal -->
<div class="modal fade text-danger" id="exampleModalExport" tabindex="-1" aria-labelledby="exampleModalExportLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border d-flex justify-content-between flex-column">
                <h5 class="modal-title" id="exampleModalExportLabel">
                    تصدير ملف Excel
                </h5>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark fw-bold">

                <form action="{{ route('import-excel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">تصدير الملف</label>
                        <input class="form-control" name="file" type="file" id="formFile">

                        <button class="btn btn-primary mt-2">تأكيد التصدير</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div>
