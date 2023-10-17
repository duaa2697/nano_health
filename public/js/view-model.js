document.addEventListener("DOMContentLoaded", function () {
    var selectElement = document.getElementById("permissionSelect");

    selectElement.addEventListener("change", function () {
        var selectedOptions = Array.from(this.selectedOptions).map(
            (option) => option.text
        );

        if (
            (selectedOptions.includes("Edit User") ||
                selectedOptions.includes("Delete User")) &&
            !selectedOptions.includes("View User")
        ) {
            var viewUserOption = Array.from(this.options).find(
                (option) => option.text === "View User"
            );
            if (viewUserOption) {
                viewUserOption.selected = true;
            }
        }

        if (
            (selectedOptions.includes("Edit Article") ||
                selectedOptions.includes("Delete Article")) &&
            !selectedOptions.includes("View Article")
        ) {
            var viewArticleOption = Array.from(this.options).find(
                (option) => option.text === "View Article"
            );
            if (viewArticleOption) {
                viewArticleOption.selected = true;
            }
        }

        if (
            (selectedOptions.includes("Edit Role") ||
                selectedOptions.includes("Delete Role")) &&
            !selectedOptions.includes("View Role")
        ) {
            var viewRoleOption = Array.from(this.options).find(
                (option) => option.text === "View Role"
            );
            if (viewRoleOption) {
                viewRoleOption.selected = true;
            }
        }
    });
});
