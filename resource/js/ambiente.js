/* requiere:
 * jquery.min.js
 * joint.js
 */

var ambiente = function($sel, width_A, height_A, static) {
    var width_a = $($sel).width(), razon = 50;  // razon para el tamaño del paper
    if ((razon * width_A + 50) > width_a)
        width_a = razon * width_A + 50;

    $('#contenedor').css({
        width: width_a

    });

    this.graph = new joint.dia.Graph;
    this.paper = new joint.dia.Paper({
        el: $($sel),
        width: razon * width_A + 50,
        height: razon * height_A + 50,
        gridSize: 10,
        model: this.graph
    });

    var rect1 = new joint.shapes.basic.Rect({
        position: {x: 10, y: 30},
        size: {width: 20, height: 20},
        attrs: {rect: {fill: '#1ABC9C'}}
    });

    var rect2 = rect1.clone();
    rect2.translate(razon * width_A);
    var rect3 = rect1.clone();
    rect3.translate(width_A * razon, height_A * razon);
    var rect4 = rect1.clone();
    rect4.translate(0, height_A * razon);

    var link1 = new joint.dia.Link({
        source: {id: rect1.id},
        target: {id: rect2.id},
        attrs: {
            '.connection': {stroke: '#E22521', 'stroke-width': 8}
        }
    });
    this.graph.addCells([rect1, rect2, link1]);

    var link2 = new joint.dia.Link({
        source: {id: rect2.id},
        target: {id: rect3.id},
        attrs: {
            '.connection': {stroke: '#E22521', 'stroke-width': 8}
        }
    });
    var link3 = new joint.dia.Link({
        source: {id: rect3.id},
        target: {id: rect4.id},
        attrs: {
            '.connection': {stroke: '#E22521', 'stroke-width': 8}
        }
    });
    var link4 = new joint.dia.Link({
        source: {id: rect1.id},
        target: {id: rect4.id},
        attrs: {
            '.connection': {stroke: '#E22521', 'stroke-width': 8}
        }
    });

    this.graph.addCells([rect1, rect2, link1]);
    this.graph.addCells([rect2, rect3, link2]);
    this.graph.addCells([rect3, rect4, link3]);
    this.graph.addCells([rect1, rect4, link4]);

    this.toJSON = function() {
        return this.graph.toJSON();
    };

    this.fromJSON = function(json) {
        this.graph.fromJSON(json);
    };

    this.setStatic = function() {
        var models = this.toJSON().cells.models;
        for (var i = 0; i < models.length; i++)
            this.graph.getCell(models[i]).unbind();
        this.paper.unbind();
        this.graph.unbind();
    };

    if (static)
        this.setStatic();
};

window.mesa_selected = false;
window.mesa_counter = 0;

var mesa = function(contenedor, config) {
    var long = 70;
    var short = Math.round(long / 4), fondo_dim = Math.round(3 * long / 2);

    var id = '';
    var ui_id = 0;
    if (typeof(config.id) !== 'undefined') {
        id = 'id="' + config.id + '"';
        ui_id = config.id;
    }

    var html = '<div ' + id + ' style="width:' + long + 'px;height:' + long + 'px;" class="mesa" >\
                    <div style="border-radius:10px;color:#F7F7F7;margin:20%;width:60%;height:60%;text-align:center;line-height:40px;font-weight:bold">' + (++window.mesa_counter) + '</div>\
                </div>\
                <div style="width:' + fondo_dim + 'px;height:' + fondo_dim + 'px; margin:-' + short + 'px 0 0 -' + short + 'px" class="fondo"></div>';
    var $mesa = $('<div>').html(html);
    var $drag = $mesa.find('.mesa');
    var $fondo = $mesa.find('.fondo');
    var $label = $drag.find('div');
    var default_color = '#1ABC9C';
    if (typeof(config.color) !== 'undefined')
        default_color = config.color;
    $(contenedor).prepend($mesa);
    $drag.draggable({
        drag: function(event, ui) {
            $fondo.css({left: ui.position.left, top: ui.position.top});
        },
        stop: function(event, ui) {
            if (typeof(config.stop) !== 'undefined') {
                config.stop($drag);
            }
            var snapped = $(this).data('ui-draggable').snapElements;
            var snappedTo = $.map(snapped, function(element) {
                return element.snapping ? element.item : null;
            });
            //console.log(snappedTo);
        },
        snap: $drag,
        containment: contenedor,
        snapTolerance: Math.round(long / 3)
    }).addTouch();
    this.set_color = function(color) {
        if (typeof(color) === 'undefined')
            color = default_color;
        $label.css('background', color);
    };
    this.set_color();
    this.set_pos = function(left, top) {
        $drag.css({'left': left, 'top': top});
        $fondo.css({'left': left, 'top': top});
    };
    this.get_pos = function() {
        return $drag.position();
    };
    this.get_label = function() {
        return $label.text();
    };
    this.get_id = function() {
        return ui_id;
    };
    var $this = this;
    if (typeof(config.position) !== 'undefined') {
        this.set_pos(config.position.left, config.position.top);
    }
    if(typeof(config.click)!=='undefined'){
        $drag.click(config.click);
    }
    if (typeof(config.selectable) !== 'undefined' && config.selectable === true)
        $mesa.click(function() {
            if (window.mesa_selected !== false)
                window.mesa_selected.set_color();
            $this.set_color('green');
            window.mesa_selected = $this;
        });

    this.remove = function() {
        $mesa.unbind();
        $drag.unbind();
        $mesa.remove();
    };
    $drag.data('mesa_obj', this);
};

function cloneObject(obj) {
    if (obj === null || typeof obj !== 'object')
        return obj;

    var temp = obj.constructor();
    for (var key in obj)
        temp[key] = cloneObject(obj[key]);

    return temp;
}
