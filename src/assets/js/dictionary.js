const TranslateLanguages = {
  languageSwitch(string, lang) {
    return this.dictionary[string][lang];
  },
  dictionary: {
    "required": { is: 'skilyrt', en: 'required' },
    "skilyrt": { is: 'skilyrt', en: 'required' },
    "Skráning í SVEF": {is: 'Skráning í SVEF', en: 'Become a member'},
    "Become a member": {is: 'Skráning í SVEF', en: 'Become a member' },
    "Loka": {is: 'Loka', en: 'Close'},
    "Close": {is: 'Loka', en: 'Close'},
    "Skoða vef": {is: 'Skoða vef', en: 'Visit Site'},
    "Visit Site": {is: 'Skoða vef', en: 'Visit Site'},
  },
  currentLanguage() {
    return myAjax.currentLang
  }
}

module.exports = TranslateLanguages
