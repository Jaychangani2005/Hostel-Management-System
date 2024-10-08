function showRoomInfo(roomType) {
    // Hide all room info
    const allRooms = document.querySelectorAll('.room-info');
    allRooms.forEach(room => {
        room.style.display = 'none';
    });

    // Show the selected room info
    const selectedRoom = document.getElementById(roomType);
    selectedRoom.style.display = 'block';
}

