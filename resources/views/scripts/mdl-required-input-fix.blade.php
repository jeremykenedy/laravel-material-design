<script type="text/javascript">

  /**
     * Check the validity state and update field accordingly.
     *
     * @public
     */
  MaterialTextfield.prototype.checkValidity = function () {
    if (this.input_.validity.valid) {
      this.element_.classList.remove(this.CssClasses_.IS_INVALID);
    } else {
      if (this.element_.getElementsByTagName('input')[0].value.length > 0) {
        this.element_.classList.add(this.CssClasses_.IS_INVALID);
      }
    }
  };

</script>