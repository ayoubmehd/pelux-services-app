import Vue from 'vue'
import VueTailwind from 'vue-tailwind'

import {
    TInput,
    TTextarea,
    TSelect,
    TRadio,
    TCheckbox,
    TButton,
    TInputGroup,
    TCard,
    TAlert,
    TModal,
    TDropdown,
    TRichSelect,
    TPagination,
    TTag,
    TRadioGroup,
    TCheckboxGroup,
    TTable,
    TDatepicker,
    TToggle,
    TDialog,
} from 'vue-tailwind/dist/components';

const settings = {
    // Use the following syntax
    // {component-name}: {
    //   component: {importedComponentObject},
    //   props: {
    //     {propToOverride}: {newDefaultValue}
    //     {propToOverride2}: {newDefaultValue2}
    //   }
    // }
    't-input': {
        component: TInput,
        props: {
            classes: 'border-0 block w-full rounded text-gray-800 bg-gray-200'
            // ...More settings
        }
    },
    't-textarea': {
        component: TTextarea,
        props: {
            classes: 'border-2 block w-full rounded text-gray-800'
            // ...More settings
        }
    },
    't-button': {
        component: TButton,
        props: {
            fixedClasses: 'block px-4 py-2 transition duration-100 ease-in-out rounded focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed',
            classes: 'text-white bg-primary border border-transparent shadow-sm hover:bg-blue-600',
            variants: {
                secondary: 'text-primary bg-white border border-primary shadow-sm hover:text-gray-600',
                error: 'text-white bg-red-500 border border-transparent rounded shadow-sm hover:bg-red-600',
                success: 'text-white bg-green-500 border border-transparent rounded shadow-sm hover:bg-green-600',
                link: 'text-blue-500 underline hover:text-blue-600'
            }
        }
    },
    't-input-group': {
        component: TInputGroup
    },
    't-checkbox': {
        component: TCheckbox,
        props: {
            fixedClasses: 'transition duration-100 text-primary ease-in-out rounded shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed',
            classes: 'text-blue-500 border-gray-300 ',
            variants: {
                error: 'text-red-500 border-red-300',
                success: 'text-green-500 border-green-300'
            }
        }
    },
    't-rich-select': {
        component: TRichSelect,
        props: {
            fixedClasses:
            {
                wrapper: "relative",
                buttonWrapper: "inline-block relative w-full", selectButton: "w-full flex text-left justify-between items-center",
                selectButtonLabel: "block truncate", selectButtonTagWrapper: "flex flex-wrap overflow-hidden",
                selectButtonTag: "bg-dark block disabled:cursor-not-allowed disabled:opacity-50 duration-100 ease-in-out focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-full shadow-sm text-sm text-white transition whitespace-nowrap m-0.5 px-3 max-w-full overflow-hidden h-8 flex items-center", "selectButtonTagText": "",
                selectButtonTagDeleteButton: "text-dark rounded-full bg-page-bg hover:bg-light hover:shadow-sm inline-flex items-center p-1 ml-1.5 transition", "selectButtonTagDeleteButtonIcon": "w-3 h-3", selectButtonPlaceholder: "block truncate", selectButtonIcon: "fill-current flex-shrink-0 ml-1 h-4 w-4",
                selectButtonClearButton: "flex flex-shrink-0 items-center justify-center absolute right-0 top-0 m-2 h-6 w-6",
                selectButtonClearIcon: "fill-current h-3 w-3", dropdown: "absolute w-full z-10", dropdownFeedback: "",
                loadingMoreResults: "", optionsList: "overflow-auto", searchWrapper: "inline-block w-full",
                searchBox: "inline-block w-full", optgroup: "", option: "cursor-pointer",
                disabledOption: "opacity-50 cursor-not-allowed", highlightedOption: "cursor-pointer",
                selectedOption: "cursor-pointer", selectedHighlightedOption: "cursor-pointer",
                optionContent: "", optionLabel: "truncate block",
                selectedIcon: "fill-current h-4 w-4",
            }
            ,
            classes:
            {
                "wrapper": "", "buttonWrapper": "", "selectButton": "px-3 py-2 text-black transition duration-100 ease-in-out bg-white border border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed", "selectButtonLabel": "", "selectButtonTagWrapper": "-mx-2 -my-2.5 py-1 pr-8",
                "selectButtonTag": "bg-blue-500 block disabled:cursor-not-allowed disabled:opacity-50 duration-100 ease-in-out focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded shadow-sm text-sm text-white transition whitespace-nowrap m-0.5 max-w-full overflow-hidden h-8 flex items-center",
                "selectButtonTagText": "",
                "selectButtonTagDeleteButton": "hover:bg-blue-600 hover:shadow-sm inline-flex items-center transition",
                "selectButtonTagDeleteButtonIcon": "", "selectButtonPlaceholder": "text-gray-400", "selectButtonIcon": "text-gray-600", "selectButtonClearButton": "hover:bg-blue-100 text-gray-600 rounded transition duration-100 ease-in-out", "selectButtonClearIcon": "", "dropdown": "-mt-1 bg-white border-b border-gray-300 border-l border-r rounded-b shadow-sm", "dropdownFeedback": "pb-2 px-3 text-gray-400 text-sm", "loadingMoreResults": "pb-2 px-3 text-gray-400 text-sm", "optionsList": "", "searchWrapper": "p-2 placeholder-gray-400", "searchBox": "px-3 py-2 bg-gray-50 text-sm rounded border focus:outline-none focus:shadow-outline border-gray-300", "optgroup": "text-gray-400 uppercase text-xs py-1 px-2 font-semibold", "option": "", "disabledOption": "", "highlightedOption": "bg-blue-100", "selectedOption": "font-semibold bg-gray-100 bg-blue-500 font-semibold text-white", "selectedHighlightedOption": "font-semibold bg-gray-100 bg-blue-600 font-semibold text-white", "optionContent": "flex justify-between items-center px-3 py-2", "optionLabel": "", "selectedIcon": "", "enterClass": "opacity-0", "enterActiveClass": "transition ease-out duration-100", "enterToClass": "opacity-100", "leaveClass": "opacity-100", "leaveActiveClass": "transition ease-in duration-75", "leaveToClass": "opacity-0"
            }

        }
    }
}

Vue.use(VueTailwind, settings)