<template>
    <div>
        <select class="form-control" v-model="check_type" @change="selectChange" name="check_type">
            <option value="">未選択</option>
            <option value="message">メッセージ受け取り時</option>
            <option value="time">時間指定</option>
        </select>
        <transition name="fade">
            <div v-if="check_type == 'message'">
                <show-message-content></show-message-content>
            </div>
            <div v-else-if="check_type == 'time'">
                <show-time-content></show-time-content>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    data: function()
    {
        return {
            check_type: "",
        }
    },
    methods: {
        selectChange: function() {
            console.log(this.check_type);
        }
    }
}
</script>

<style media="screen">
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
