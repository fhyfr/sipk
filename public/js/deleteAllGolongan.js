$(document).ready(function() {
    $("#master").on("click", function(e) {
        if ($(this).is(":checked", true)) {
            $(".sub_chk").prop("checked", true);
        } else {
            $(".sub_chk").prop("checked", false);
        }
    });

    $(".delete_all").on("click", function(e) {
        let allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr("data-id"));
        });

        if (allVals.length <= 0) {
            alert("Pilih data yang ingin Anda hapus!");
        } else {
            let check = confirm("Anda yakin ingin menghapus data ini?");
            if (check == true) {
                let join_selected_values = allVals.join(",");

                $.ajax({
                    url: $(this).data("url"),
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    data: "ids=" + join_selected_values,
                    success: function(data) {
                        if (data["success"]) {
                            $(".sub_chk:checked").each(function() {
                                $(this)
                                    .parents("tr")
                                    .remove();
                            });
                            alert(data["success"]);
                        } else if (data["error"]) {
                            alert(data["error"]);
                        } else {
                            alert("Whoops Something went wrong!!");
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });

                $.each(allVals, function(index, value) {
                    $("table tr")
                        .filter("[data-row-id='" + value + "']")
                        .remove();
                });
            }
        }
    });

    $("[data-toggle=confirmation]").confirmation({
        rootSelector: "[data-toggle=confirmation]",
        onConfirm: function(event, element) {
            element.trigger("confirm");
        }
    });

    $(document).on("confirm", function(e) {
        let ele = e.target;
        e.preventDefault();

        $.ajax({
            url: ele.href,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function(data) {
                if (data["success"]) {
                    $("#" + data["tr"]).slideUp("slow");
                    alert(data["success"]);
                } else if (data["error"]) {
                    alert(data["error"]);
                } else {
                    alert("Whoops Something went wrong!!");
                }
            },
            error: function(data) {
                alert(data.responseText);
            }
        });

        return false;
    });
});
