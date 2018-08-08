<template>
    <div>
        <el-time-select
        placeholder="Start time"
        v-model="startTime"
        :picker-options="{
            start: '00:00',
            step: '01:00',
            end: '24:00'
            }">
        </el-time-select>
    </div>
</template>

<script>
export default {
    data: function()
    {
        return {
            startTime: '',
        }
    },
    methods: {
    }
}
</script>

<style media="screen">
.time-element-form-control {
    width:100% !important;
    margin-top:15px !important;
}
</style>
