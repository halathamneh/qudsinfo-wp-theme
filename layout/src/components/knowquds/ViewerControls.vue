<template>
  <div class="viewer-controls">
    <div class="zoom-btns">
      <button class="btn btn-light" @click="zoomIn">
        <i class="fa fa-plus"></i>
      </button>
      <button class="btn btn-light" @click="zoomOut">
        <i class="fa fa-minus"></i>
      </button>
    </div>
    <div class="move-buttons">
      <div class="vertical-container">
        <button @click="panUp" class="btn btn-light">
          <i class="fa fa-angle-up"></i>
        </button>
      </div>
      <div class="horizontal-container">
        <button @click="panRight" class="btn btn-light">
          <i class="fa fa-angle-right"></i>
        </button>
        <button @click="panLeft" class="btn btn-light">
          <i class="fa fa-angle-left"></i>
        </button>
      </div>
      <div class="vertical-container">
        <button @click="panDown" class="btn btn-light">
          <i class="fa fa-angle-down"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ViewerControls",
  props: {
    panzoomInstance: {
      type: Object,
      default: () => ({}),
    },
  },
  methods: {
    panLeft() {
      this.panzoomInstance.pan(25, 0, { relative: true });
    },
    panRight() {
      this.panzoomInstance.pan(-25, 0, { relative: true });
    },
    panUp() {
      this.panzoomInstance.pan(0, 25, { relative: true });
    },
    panDown() {
      this.panzoomInstance.pan(0, -25, { relative: true });
    },
    zoomIn() {
      this.panzoomInstance.zoomIn();
    },
    zoomOut() {
      this.panzoomInstance.zoomOut();
    },
  },
};
</script>

<style lang="scss" scoped>
.viewer-controls {
  position: fixed;
  bottom: 56px;
  right: 32px;
  @media screen and (max-width: 500px) {
    bottom: 16px;
    right: 16px;
  }

  .rtl & {
    left: 32px;
    right: auto;
    @media screen and (max-width: 500px) {
      left: 16px;
      right: auto;
    }
  }

  .btn {
    padding: 6px 10px;
    height: 16px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.25);
    &:after,
    &:before {
      content: none;
    }
  }
}

.zoom-btns {
  margin-bottom: 16px;
  display: flex;
  justify-content: space-around;
}

.move-buttons {
  display: flex;
  flex-direction: column;
  width: 70px;

  .vertical-container {
    display: flex;
    justify-content: center;
  }

  .horizontal-container {
    display: flex;
    justify-content: space-between;
    .rtl & {
      flex-direction: row-reverse;
    }
  }
}
</style>
