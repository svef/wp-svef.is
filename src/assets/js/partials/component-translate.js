const TranslateLanguages = {
  languageSwitch(string, lang) {
    return this.dictionary[string][lang];
  },
  dictionary: {
    required: { is: 'skilyrt', en: 'required' },
    skilyrt: { is: 'skilyrt', en: 'required' }
  },
  currentLanguage() {
    return myAjax.currentLang
  }
}

module.exports = TranslateLanguages
