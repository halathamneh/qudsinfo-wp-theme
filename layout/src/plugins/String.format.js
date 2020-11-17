if (!String.format) {
  String.format = function(format, ...args) {
    return format.replace(/{(\d+)}/g, function(match, number) {
      return typeof args[number] !== 'undefined' ? args[number] : match
    })
  }
}
