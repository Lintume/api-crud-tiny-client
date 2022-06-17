import {ref} from 'vue'
import axios from "axios";

export default function useFieldTypes() {
    const fieldTypes = ref([])

    const getFieldTypes = async () => {
        let response = await axios.get('/api/field-types')
        fieldTypes.value = response.data.data;
    }

    return {
        fieldTypes,
        getFieldTypes
    }
}
